<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
		$this->load->model('asteroid_model');
		$this->load->model('compare_model');
	}
	
	
	public function index()
	{
		$data['asteroid'] = $this->asteroid_model->get_random_asteroid();
		
		$data['comparison_objects'] = $this->compare_model->get_default_compare();
	
		$this->load->view('welcome_message',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */