<?php

class Asteroid_Library
{

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model("asteroid_model");
    }

    function asteroid_search($spec_type = null, $magnitude_min = null, $magnitude_max = null, $spk_id = null, $diameter_max = null, $diameter_min = null, $near_earth_object = null, $text = null)
    {
        $data_array = array();
        $where = "";

        if ($spec_type != null)
        {
            $data_array[] = $spec_type;
            $where .= "spec_type_smassi = ? OR spec_type_tholen = ? ";
        }

        if ($magnitude_min != null)
        {
            $data_array[] = $magnitude_min;
            $where .= "magnitude > ? ";
        }

        if ($magnitude_max != null)
        {
            $data_array[] = $magnitude_max;
            $where .= "magnitude < ? ";
        }

        if ($spk_id != null)
        {
            $data_array[] = $spk_id;
            $where .= "spk_id = ? ";
        }

        if ($diameter_min != null)
        {
            $data_array[] = $diameter_min;
            $where .= "diameter > ? ";
        }

        if ($diameter_max != null)
        {
            $data_array[] = $diameter_max;
            $where .= "diameter < ? ";
        }

        if ($near_earth_object != null)
        {
            $data_array[] = $near_earth_object;
            $where .= "near_earth_object = ? ";
        }

        if ($text != null)
        {
            $data_array[] = $text;
            $where .= "full_name LIKE ? OR primary_designation LIKE ? ";
        }

        list($result, $num_rows) = $this->CI->asteroid_model->search($where);

        $output = $this->prepare_results_for_output($result);

        return array($output, $num_rows);
    }

    function prepare_results_for_output($result)
    {
        $asteroid_data = array();

        foreach($result as $row)
        {
            $asteroid = array();

            $asteroid['full_name'] = $row['full_name'];
            $asteroid['near_earth_object'] = $row['near_earth_object'];
            $asteroid['diameter'] = $row['diameter'];
            $asteroid['potentially_hazardous'] = $row['potentially_hazardous'];
            $asteroid['magnitude'] = $row['magnitude'];
            $asteroid['spk_id'] = $row['spk_id'];

            if (isset($row['spec_type_smassi']) && !empty($row['spec_type_smassi']))
            {
                $asteroid['spec_type'] = $row['spec_type_smassi'];
            }
            elseif (isset($row['spec_type_tholen']) && !empty($row['spec_type_tholen']))
            {
                $asteroid['spec_type'] = $row['spec_type_tholen'];
            }

            $asteroid_data[] = $asteroid;
        }

        return $asteroid_data;

    }

    function get_random_asteroid()
    {
        //$num_asteroids = $this->asteroid_model->get_asteroid_count();

        $rand = 1;

        $asteroid = $this->CI->asteroid_model->get_asteroid_data_by_pk($rand);

        return $asteroid;
    }

    function get_all_spec_types(){

        return $this->CI->asteroid_model->get_distinct_spec_types();
    }

}
