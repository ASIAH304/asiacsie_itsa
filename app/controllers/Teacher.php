<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher extends MY_Controller {
	public function index(){
		$this->load->view('welcome_message');
	}
}