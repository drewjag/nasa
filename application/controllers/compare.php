<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
		$this->load->model('asteroid_model');
		$this->load->model('compare_model');
	}

	public function index()
	{
        $compare_types = $this->compare_model->get_compare_types();

        $compare_type_array = array();
        foreach($compare_types as $compare_type)
        {
            $compare_type_array[$compare_type['compare_type_pk']] = $compare_type['name'];
        }
        $data['compare_types'] = $compare_type_array;

        $measurement_types = $this->compare_model->get_unit_of_measurement_by_compare_type(1);
        $measurement_type_array = array();
        foreach($measurement_types as $measurement_type)
        {
            $measurement_type_array[$measurement_type['compare_type_pk']] = $measurement_type['name'];
        }
        $data['measurement_types'] = $measurement_type_array;

		$this->load->view('add_compare_object',$data);
	}

    public function add_compare_object()
    {
        $compare_object['object_name'] = $this->input->post('name');
        $compare_object['unit_of_measurement_fk'] = $this->input->post('measurement_type');
        $compare_object['compare_type_fk'] = $this->input->post('compare_type');
        $compare_object['measurement_value'] = $this->input->post('object_value');
        $compare_object['image_url'] = $this->input->post('image_url');

        $this->compare_model->insert_compare_object($compare_object);
        $this->index();

    }

    public function view_asteroid($asteroid_pk = null,$compare_object_pk = null)
    {
        if (!empty($asteroid_pk))
        {
            $asteroid = $this->asteroid_model->get_asteroid_data_by_pk($asteroid_pk);
        }
        else
        {
            $asteroid = $this->asteroid_model->get_random_asteroid();
        }

        $compare_object_array = array();

        if (!empty($compare_object_pk))
        {
            $compare_object_array[] = $this->compare_model->get_compare_object_by_pk($compare_object_pk);
        }
        else
        {
            $compare_object_array[] = $this->compare_model->get_random_compare_object();
        }

        for($i=0;$i<4;$i++)
        {
            $compare_object_array[] = $this->compare_model->get_random_compare_object();
        }

        foreach ($compare_object_array as $compare_object)
        {
            $comparison_output[] = $this->compare_library->compare_object_to_asteroid($compare_object,$asteroid);
        }

        $data['comparison_output'] = $comparison_output;
        $data['asteroid'] = $asteroid;

        $this->load->view('asteroid_compare_view',$data);

    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */