<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Context extends MY_Controller {
	public function index(){
	}
	public function detail($itsa_id = NULL){
		$this->data['context'] = $this->context->get_context($itsa_id);
		$this->data['user_name'] = $this->context->get_user_name();
		$this->data['teacher_name'] = $this->context->get_teacher_name();
		$this->data['teams'] = $this->context->get_teams($itsa_id);

		if ( empty($this->data['context']) ){
			show_404();
        }
        $this->assets->set_title(context_name($this->data['context']->itsa_type,$this->data['context']->itsa_th,$this->data['context']->itsa_date)."參賽資料");
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		switch( $this->data['context']->itsa_type ){
			case 1:
				$this->load->view('context/detail_itsa',$this->data);
			break;
			case 2:
				$this->load->view('context/detail_ptc',$this->data);
			break;
			case 3:
				$this->load->view('context/detail_cpe',$this->data);
			break;
			default:
				$this->load->view('context/detail',$this->data);
		}
		
		$this->load->view('common/footer',$this->data);
	}
}