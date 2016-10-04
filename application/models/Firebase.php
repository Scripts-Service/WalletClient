<?php
defined('BASEPATH') OR exit('No direct script access allowed');
const DEFAULT_URL = 'https://test-82d9b.firebaseio.com/';
class Firebase extends CI_Model {
	public function get(){
		$UID = $this->config->item('UID');
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL);
		$data = $firebase->get("UserData/$UID/AccountData/");
		if(json_decode($data) == null){
			return false;
		}else{
			return json_decode($data);
		}
	}
}
