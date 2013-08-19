<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function index() {
		$this->load->view('dash');
		$this->load->view('dataview/sidebar');
		$this->load->view('no_selection');
		$this->load->view('footer');
	}
	
	public function clear() {
		$this->load->view('no_selection');
	}
	
	public function credits() {
		$this->load->view('credits');
	}
	
}