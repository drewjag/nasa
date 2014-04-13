<?php
class Compare_model extends Model
{

    function __construct()
    {
        parent::Model();
    }


    function get_default_compare()
    {
        $sql = "SELECT * FROM nasa.comparison_objects WHERE comparison_objects_pk < 5";
        return $this->db->query($sql,array())->result_array();
    }





}