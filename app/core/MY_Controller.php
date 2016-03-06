<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller{
	public $data = array();
	public $site_name = "";
    public function __construct(){
		parent::__construct();
		$this->site_name = $this->config->item('site_name');
		if( ENVIRONMENT == "development" ){
			$this->assets->add_meta_tag("robots", "noindex", "name");
			$this->assets->add_meta_tag("googlebot", "noindex", "name");
		}
		$this->assets->add_css(asset_url('style/bootstrap.min.css'));
		$this->assets->add_css(asset_url('style/sb.css'));
		$this->assets->add_css(asset_url('style/semantic.min.css'));
		$this->assets->add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
		$this->assets->add_css(asset_url('style/style.css'));
		
		$this->assets->add_js('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
		$this->assets->add_js(asset_url('js/bootstrap.min.js'));

		$this->assets->set_site_name($this->site_name);
	}
}