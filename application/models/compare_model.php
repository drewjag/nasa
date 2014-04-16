<?php
class Compare_model extends CI_Model
{

    function get_default_compare()
    {
        $sql = "SELECT * FROM nasa.comparison_objects WHERE comparison_object_pk < 5";
        return $this->db->query($sql,array())->result_array();
    }

    function get_compare_object_by_pk($compare_object_pk)
    {
        $sql = "SELECT * FROM nasa.comparison_objects co
                        JOIN nasa.unit_of_measurement uom ON co.unit_of_measurement_fk = uom.unit_of_measurement_pk
                            WHERE comparison_object_pk = ?";
        return $this->db->query($sql,array($compare_object_pk))->row_array();
    }

    function get_compare_objects_by_type($compare_type)
    {
        $sql = "SELECT * FROM nasa.comparison_objects WHERE compare_type_fk = ?";
        return $this->db->query($sql,array($compare_type))->result_array();
    }

    function get_compare_types()
    {
        $sql = "SELECT * FROM nasa.compare_type";
        return $this->db->query($sql)->result_array();
    }

    function get_unit_of_measurement_by_compare_type($compare_type_pk)
    {
        $sql = "SELECT * FROM unit_of_measurement uom
                    JOIN nasa.compare_measurement cm ON uom.unit_of_measurement_pk = cm.unit_of_measurement_fk
                    WHERE cm.compare_type_fk = ?";
        return $this->db->query($sql,array($compare_type_pk))->result_array();
    }

    function insert_compare_object($compare_object)
    {
        $sql = "INSERT INTO nasa.comparison_objects (object_name, unit_of_measurement_fk,compare_type_fk,measurement_value,image_url) VALUES (?,?,?,?,?)";
        $this->db->query($sql,array($compare_object['object_name'],$compare_object['unit_of_measurement_fk'],$compare_object['compare_type_fk'],$compare_object['measurement_value'],$compare_object['image_url']));
        return $this->db->insert_id();
    }

    function get_random_compare_pk()
    {
        $sql = "SELECT * FROM nasa.comparison_objects ORDER BY RAND() LIMIT 0,1";
        $result = $this->db->query($sql)->row_array();
        return $result['comparison_object_pk'];
    }

    function get_all_objects()
    {
        $sql = "SELECT * FROM nasa.comparison_objects ORDER BY object_name LIMIT 40";
        $result = $this->db->query($sql)->result_array();
        $output_array = array();
        foreach($result as $row)
        {
            $output_array[$row['comparison_object_pk']] = $row['object_name'];
        }
        return $output_array;
    }

    function get_compare_measurement_link()
    {
        $sql = "SELECT * FROM nasa.compare_type ct
                    JOIN nasa.compare_measurement cm ON ct.compare_type_pk = cm.compare_type_fk
                    JOIN nasa.unit_of_measurement uom ON cm.unit_of_measurement_fk = uom.unit_of_measurement_pk";
        $result = $this->db->query($sql)->result_array();
        $output_array = array();
        foreach($result as $row)
        {
            $output_array[$row['unit_of_measurement_fk']][] = $row;
        }
        return $output_array;
    }



}