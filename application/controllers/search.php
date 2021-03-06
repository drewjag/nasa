<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('asteroid_model');
		$this->load->model('compare_model');
	}

	public function index()
	{
		$data['asteroid'] = $this->asteroid_library->get_random_asteroid();
		
		$data['comparison_objects'] = $this->compare_model->get_default_compare();

        $data['spec_types'] = $this->asteroid_library->get_all_spec_types();

		$this->load->view('asteroid_search',$data);
	}

    public function search_asteroid()
    {
        $spec_type = $this->input->post("spec_type");
        $magnitude_min = $this->input->post("magnitude_min");
        $magnitude_max = $this->input->post("magnitude_max");
        $spk_id = $this->input->post("spk_id_input");
        $diameter_max = $this->input->post("diameter_max");
        $diameter_min = $this->input->post("diameter_min");
        $near_earth_object = $this->input->post("near_earth_object");
        $text = $this->input->post('text_search');

        list($data['asteroid_result'], $data['num_rows']) = $this->asteroid_library->asteroid_search($spec_type, $magnitude_min, $magnitude_max, $spk_id, $diameter_max, $diameter_min, $near_earth_object, $text);

        $this->load->view('asteroid_result',$data);
    }

    public function get_random_asteroid(){
        echo json_encode($this->asteroid_library->get_random_asteroid());
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/search.php */