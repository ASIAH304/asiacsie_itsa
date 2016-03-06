<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function index(){
		$this->data['all_contexts'] = $this->context->get_contexts();
		$this->data['itsa_contexts'] = $this->context->get_contexts("itsa");
		$this->data['ptc_contexts'] = $this->context->get_contexts("ptc");
		$this->data['cpe_contexts'] = $this->context->get_contexts("cpe");
		$this->data['contexts_count'] = $this->context->contexts_count();
		$this->assets->set_title("首頁");
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('welcome/index',$this->data);
		$this->load->view('common/footer',$this->data);
	}
}
