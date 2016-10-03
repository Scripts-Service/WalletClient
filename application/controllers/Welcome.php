<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index()
	{
		$count = 10;
		while (true) {
			$count++;
			if($count >= 10){
				$count = 0;
				$isTotal = $this->users->showTotal()[0]->Total;
				$this->displayLog->show("========================================");
				$this->displayLog->show("Today Total Topup: " . ($isTotal == "" ? 0 : number_format($isTotal)));
				$this->displayLog->show("========================================");
			}
			$this->displayLog->show("****************************************");
			$this->displayLog->show("-> Running Checking");
			$data = $this->Firebase->get();
			if ($data) {
				foreach ($data as $value) {
					$isSave = $this->users->save($value);
					if($isSave[0]->ResultCode == 1){
						$this->displayLog->show("--> Save Success [Email Error] | Ref: " . $value->TransectionData->Ref . " Amount: ". number_format($value->TransectionData->Amount) . " personalMessage: " .$value->TransectionData->personalMessage);
						sleep(1);
					}elseif($isSave[0]->ResultCode == 2){
						$this->displayLog->show("--> Save Success | Ref: " . $value->TransectionData->Ref . " Amount: ". number_format($value->TransectionData->Amount) . " personalMessage: " .$value->TransectionData->personalMessage);
						sleep(1);
					}
					sleep(1);
				}
			}
			$this->displayLog->show("-> Success Checking");
			$this->displayLog->show("----------------------------------------");
			sleep(10);
		}
	}
}
