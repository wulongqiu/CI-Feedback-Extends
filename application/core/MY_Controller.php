<?php
class MY_Controller extends CI_Controller {

	public $data = array();
		function __construct() {
			parent::__construct();
			$this->data['error'] = array();
			$this->data['site_name'] = config_item('site_name');
			$this->data['site_url'] = config_item('site_url');
		}
}