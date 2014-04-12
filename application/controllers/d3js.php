<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class D3js extends CI_Controller {

	public function index()
	{
		redirect('/welcome/d3js_test');
	}

	public function basics() {
		$this->load->view('d3js_sandbox/d3js_basics');
	}

	public function bar_charts() {
		$this->load->view('d3js_sandbox/d3js_barcharts');
	}

	public function transitions() {
		$this->load->view('d3js_sandbox/d3js_transitions');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */