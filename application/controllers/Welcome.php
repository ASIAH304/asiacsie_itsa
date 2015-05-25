<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function view($page = 'index')
	{	
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
        	// Whoops, we don't have a page for that!
			show_404();
    	}

		//$this->load->driver();
		//$this->load->view('welcome_message');
		$data['title']="ttt";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
    	$this->load->view('templates/footer', $data);
	}

}
