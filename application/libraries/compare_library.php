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
            $compare_object['num_objects'] = $this->calculate_conversion_diameter($compare_object,$asteroid);
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

    }

    function calculate_conversion_composition($object,$asteroid)
    {

    }


}
