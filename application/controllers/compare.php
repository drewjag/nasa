<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compare extends CI_Controller {

	function __construct()
    {
        parent::__construct();
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
            $measurement_type_array[$measurement_type['unit_of_measurement_pk']] = $measurement_type['short_name_uofm'];
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

        $object_id = $this->compare_model->insert_compare_object($compare_object);

        $this->view_asteroid(1,$object_id);
    }

    public function view_asteroid($asteroid_pk = null,$compare_object_pk = null)
    {
        if (!empty($asteroid_pk))
        {
            $asteroid = $this->asteroid_library->get_asteroid_by_pk($asteroid_pk);
        }
        else
        {
            $asteroid = $this->asteroid_library->get_random_asteroid();
        }

        $compare_object_array = array();
        $exclude_object_pks = array();

        $object_compare = $this->input->post('object_compare');
        if (empty($compare_object_pk) && $object_compare !== false)
        {
            $compare_object_pk = $object_compare;
        }

        if (!empty($compare_object_pk))
        {
            $compare_object = $this->compare_library->get_compare_object_by_pk($compare_object_pk);
            $compare_object_array[$compare_object['comparison_object_pk']] = $compare_object;
            $exclude_object_pks[] = $compare_object['comparison_object_pk'];
        }
        else
        {
            $compare_object = $this->compare_library->get_random_compare_object();
            $compare_object_array[$compare_object['comparison_object_pk']] = $compare_object;
            $exclude_object_pks[] = $compare_object['comparison_object_pk'];
        }

        for($i=0;$i<4;$i++)
        {
            $compare_object = $this->compare_library->get_random_compare_object($exclude_object_pks);
            $compare_object_array[$compare_object['comparison_object_pk']] = $compare_object;
            $exclude_object_pks[] = $compare_object['comparison_object_pk'];
        }

        foreach ($compare_object_array as $compare_object)
        {
            $comparison_output[] = $this->compare_library->compare_object_to_asteroid($compare_object,$asteroid);
        }

        $data['comparison_output'] = $comparison_output;
        $data['asteroid'] = $asteroid;
        $data['comparison_object_options'] = $this->compare_model->get_all_objects();

        $this->load->view('asteroid_compare_view',$data);

    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/compare.php */