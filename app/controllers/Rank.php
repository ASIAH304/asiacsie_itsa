<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rank extends MY_Controller {
	public function index(){
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('rank/index',$this->data);
		$this->load->view('common/footer',$this->data);
	}
}