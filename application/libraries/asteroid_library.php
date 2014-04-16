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
        $where = " WHERE ";

        if ($spec_type != null)
        {
            $data_array[] = $spec_type;
            $data_array[] = $spec_type;
            $where .= "( spec_type_smassi = ? OR spec_type_tholen = ? )";
        }

        if ($magnitude_min != null)
        {
            if(!empty($data_array)){
                $where .= "AND ";
            }
            $data_array[] = $magnitude_min;
            $where .= "magnitude > ? ";
        }

        if ($magnitude_max != null)
        {
            if(!empty($data_array)){
                $where .= "AND ";
            }
            $data_array[] = $magnitude_max;
            $where .= "magnitude < ? ";
        }

        if ($spk_id != null)
        {
            if(!empty($data_array)){
                $where .= "AND ";
            }
            $data_array[] = $spk_id;
            $where .= "spk_id = ? ";
        }

        if ($diameter_min != null)
        {
            if(!empty($data_array)){
                $where .= "AND ";
            }
            $data_array[] = $diameter_min;
            $where .= "diameter > ? ";
        }

        if ($diameter_max != null)
        {
            if(!empty($data_array)){
                $where .= "AND ";
            }
            $data_array[] = $diameter_max;
            $where .= "diameter < ? ";
        }

        if ($near_earth_object != null && !empty($near_earth_object))
        {
            if(!empty($data_array)){
                $where .= "AND ";
            }
            $data_array[] = $near_earth_object;
            $where .= "near_earth_object = ? ";
        }

        if ($text != null)
        {
            if(!empty($data_array)){
                $where .= "AND ";
            }
            $data_array[] = $text;
            $data_array[] = $text;
            $where .= "full_name LIKE ? OR primary_designation LIKE ? ";
        }

        if ($where == " WHERE ")
        {
            $where = '';
        }

        list($result, $num_rows) = $this->CI->asteroid_model->search($where, $data_array);

        $output = $this->prepare_results_for_output($result);

        return array($output, $num_rows);
    }

    function prepare_results_for_output($result)
    {
        $asteroid_data = array();

        foreach($result as $row)
        {
            $asteroid = array();

            $asteroid['asteroid_pk'] = $row['asteroid_pk'];
            $asteroid['full_name'] = $row['full_name'];
            $asteroid['near_earth_object'] = $row['near_earth_object'];
            $asteroid['diameter'] = $row['diameter'];
            $asteroid['potentially_hazardous'] = $row['potentially_hazardous'];
            $asteroid['magnitude'] = $row['magnitude'];
            $asteroid['spk_id'] = ltrim($row['spk_id'],'0');
            $asteroid['spec_type_smassi'] = $row['spec_type_smassi'];
            $asteroid['spec_type_tholen'] = $row['spec_type_tholen'];

            if (isset($row['spec_type_smassi']) && !empty($row['spec_type_smassi']))
            {
                $asteroid['spec_type'] = $row['spec_type_smassi'];
            }
            elseif (isset($row['spec_type_tholen']) && !empty($row['spec_type_tholen']))
            {
                $asteroid['spec_type'] = $row['spec_type_tholen'];
            }
            else if(empty($row['spec_type_tholen']) && empty($row['spec_type_smassi'])){
                $asteroid['spec_type'] = "";
            }

            $asteroid_data[] = $asteroid;
        }

        return $asteroid_data;

    }

    function get_random_asteroid()
    {
        $rand_asteroid_pk = $this->CI->asteroid_model->get_random_pk();

        $asteroid = $this->get_asteroid_by_pk($rand_asteroid_pk);

        return $asteroid;
    }

    function get_asteroid_by_pk($asteroid_pk)
    {

        $asteroid = $this->CI->asteroid_model->get_asteroid_data_by_pk($asteroid_pk);

        $output = $this->prepare_results_for_output($asteroid);

        return $output;
    }

    function get_all_spec_types(){

        return $this->CI->asteroid_model->get_distinct_spec_types();
    }

}
