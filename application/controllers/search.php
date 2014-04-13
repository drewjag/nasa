<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
		$this->load->model('asteroid_model');
		$this->load->model('compare_model');
	}

	public function index()
	{
		$data['asteroid'] = $this->asteroid_search_library->get_random_asteroid();
		
		$data['comparison_objects'] = $this->compare_model->get_default_compare();
	
		$this->load->view('welcome_message',$data);
	}

    public function search_asteroid()
    {
        $spec_type = $this->input->post("spec_type");
        $magnitude_min = $this->input->post("magnitude_min");
        $magnitude_max = $this->input->post("magnitude_max");
        $spk_id = $this->input->post("spk_id");
        $diameter_max = $this->input->post("diameter_max");
        $diameter_min = $this->input->post("diameter_min");
        $near_earth_object = $this->input->post("near_earth_object");
        $text = $this->input->post("text_search");

        list($data['asteroid_result'], $data['num_rows']) = $this->asteroid_search_library->asteroid_search($spec_type, $magnitude_min, $magnitude_max, $spk_id, $diameter_max, $diameter_min, $near_earth_object, $text);

        $this->load->view('asteroid_result',$data);
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */