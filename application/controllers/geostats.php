<?php

class Geostats extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view('geostats/main');
	}
	
}

?>