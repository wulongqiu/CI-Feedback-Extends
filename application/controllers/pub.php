<?php
class Pub extends Pub_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$this->load->view('pub', $this->data);
	}


}