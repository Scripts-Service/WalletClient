<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class displayLog extends CI_Model {
	public function show($msg){
    echo "[" . date("d.m.Y h:i:s") . "] " . $msg . "\n";
	}
}
