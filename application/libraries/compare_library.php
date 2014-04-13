<?php

class Compare_library
{

    function __construct()
    {
        $this->CI =& get_instance();
    }

    function get_random_compare_object()
    {
        $num_compare_objects = $this->compare_model->get_num_compare_objects();

        $rand = 0;
        return $this->compare_model->get_compare_object_rand($rand);
    }

    function compare_object_to_asteroid($compare_object,$asteroid)
    {

        if ($compare_object['name'] == 'Circumference')
        {
            $compare_object['num_objects'] = $this->calculate_conversion_circumference($compare_object,$asteroid);
        }
        elseif ($compare_object['name'] == 'Diameter')
        {
            list($compare_object['num_objects'],$compare_object['object_larger']) = $this->calculate_conversion_diameter($compare_object,$asteroid);
        }
        elseif ($compare_object['name'] == 'Composition')
        {
            $compare_object['num_objects'] = $this->calculate_conversion_composition($compare_object,$asteroid);
        }

        return $compare_object;
    }

    function calculate_conversion_circumference($object,$asteroid)
    {

    }

    function calculate_conversion_diameter($object,$asteroid)
    {
        //Diameter Calculation
        $base_object_value = $object['base_measurement_ratio'] * $object['measurement_value'];

        //Diameter is in km in database
        $base_asteroid_value = $asteroid['diameter'] * 1000;

        if ($base_object_value > $base_asteroid_value)
        {
            $object_larger = true;
        }
        else
        {
            $object_larger = false;
        }
        $num_of_objects = $base_asteroid_value / $base_object_value;

        return array($num_of_objects, $object_larger);
    }

    function calculate_conversion_composition($object,$asteroid)
    {

    }

}
