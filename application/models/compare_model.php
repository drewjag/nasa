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

    function is_same_composition($object, $asteroid){
        $sql = "SELECT a.full_name, a.spec_group_type, stg.element_fk as element FROM asteroid a
                JOIN spec_type_group stg ON stg.spec_type_group_pk = a.spec_group_type
                JOIN element e ON stg.element_fk = e.element_pk
                WHERE a.asteroid_pk = ? ";

        $asteroid_result = $this->db->query($sql, array($asteroid[0]['asteroid_pk']))->result_array();

        if(count($asteroid_result) == 0){
            return false;
        }

        $sql = "SELECT co.object_name, e.element_pk as element FROM comparison_objects co
                JOIN object_composition oc ON oc.comparison_object_fk = co.comparison_object_pk
                JOIN element e ON oc.element_fk = e.element_pk
                WHERE co.comparison_object_pk = ?";

        $object_result = $this->db->query($sql, array($object['comparison_object_pk']))->result_array();


        if(count($object_result) == 0){
            return false;
        }

        if($object_result[0]['element'] == $asteroid_result[0]['element']){
            return true;
        }
        return false;
    }



}