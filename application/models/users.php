<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class users extends CI_Model {
	public function save($data){
    return $this->db->query('EXEC WALLET_FUNCTION_CALL_ADD ?, ?, ?, ?, ?', array($data->TransectionData->TransectionID, (int)$data->TransectionData->Amount, $data->TransectionData->personalMessage, $data->TransectionData->Ref, $data->TransectionData->Date))->result();
	}
  public function showTotal(){
    return $this->db->query('EXEC WALLET_FUNCTION_CALL_TOTAL ?', array(date("d/m/y")))->result();
  }
}
