<?php
class Pub_Controller extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('pub_m');
	}
}