<?php

class Compare_library
{

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model("compare_model");
        $this->comparison_links = $this->CI->compare_model->get_compare_measurement_link();
    }

    function get_compare_object_by_pk($compare_object_pk)
    {
        return $this->CI->compare_model->get_compare_object_by_pk($compare_object_pk);
    }

    function get_random_compare_object($exclude_pks = array())
    {
        $rand_pk = $this->CI->compare_model->get_random_compare_pk();
        $index = 0;
        while (in_array($rand_pk,$exclude_pks) && $index != count($exclude_pks))
        {
            $rand_pk = $this->CI->compare_model->get_random_compare_pk();
            $index++;
        }

        return $this->get_compare_object_by_pk($rand_pk);
    }

    function compare_object_to_asteroid($compare_object,$asteroid,$compare_type_fk = null)
    {
        $comparison_options_count = count($this->comparison_links[$compare_object['unit_of_measurement_fk']]);

        if ($compare_type_fk === null)
        {
            if ($comparison_options_count == 1)
            {
                $rand = 0;
            }
            else
            {
                $rand = rand(0,$comparison_options_count-1);
            }
            $compare_type_fk = $this->comparison_links[$compare_object['unit_of_measurement_fk']][$rand]['compare_type_fk'];
        }

        $compare_object['name'] = $this->comparison_links[$compare_object['unit_of_measurement_fk']][$rand]['name'];

        if ($compare_type_fk == 1)
        {
            list($compare_object['num_objects'],$compare_object['object_larger']) = $this->calculate_conversion_circumference($compare_object,$asteroid);
        }
        elseif ($compare_type_fk == 2)
        {
            list($compare_object['num_objects'],$compare_object['object_larger']) = $this->calculate_conversion_diameter($compare_object,$asteroid);
        }
        elseif ($compare_type_fk == 3)
        {
            list($compare_object['num_objects'],$compare_object['object_larger']) = $this->calculate_conversion_composition($compare_object,$asteroid);
        }

        return $compare_object;
    }

    function calculate_conversion_circumference($object,$asteroid)
    {
        //Circumference Calculation
        $base_object_value = $object['base_measurement_ratio'] * $object['measurement_value'];

        //Diameter is in km in database
        $base_asteroid_value = $asteroid[0]['diameter'] * 1000;
        $radius = $base_asteroid_value / 2;
        $pie = 3.14159265359;

        $circumference_of_asteroid_base = 2 * $pie * $radius;

        return $this->is_asteroid_larger($base_object_value, $circumference_of_asteroid_base);
    }

    function calculate_conversion_diameter($object,$asteroid)
    {
        //Diameter Calculation
        $base_object_value = $object['base_measurement_ratio'] * $object['measurement_value'];

        //Diameter is in km in database
        $base_asteroid_value = $asteroid[0]['diameter'] * 1000;

        return $this->is_asteroid_larger($base_object_value, $base_asteroid_value);
    }

    function calculate_conversion_composition($object,$asteroid)
    {
        $base_object_value = $object['base_measurement_ratio'] * $object['measurement_value'];

        //Mass is in cm3
        $base_asteroid_value = $asteroid['mass'];

        return $this->is_asteroid_larger($base_object_value, $base_asteroid_value);
    }

    function calculate_conversion_volume($object,$asteroid)
    {
        $base_object_value = $object['base_measurement_ratio'] * $object['measurement_value'];

        //Mass is in litres
        $base_asteroid_value = $asteroid['volume'];

        return $this->is_asteroid_larger($base_object_value, $base_asteroid_value);
    }

    function is_asteroid_larger($base_object_value, $base_asteroid_value)
    {
        $object_larger = false;
        if ($base_object_value > $base_asteroid_value)
        {
            $object_larger = true;
        }
        $num_of_objects = $base_asteroid_value / $base_object_value;

        return array($num_of_objects, $object_larger);
    }

}
