<?php
class Asteroid_model extends CI_Model
{

    function get_asteroid_data_by_pk($asteroid_pk)
    {
        $sql = "SELECT * FROM nasa.asteroid WHERE asteroid_pk = ?";
        return $this->db->query($sql,array($asteroid_pk))->result_array();
    }

    function get_asteroid_count()
    {
        $sql = "SELECT count(asteroid_pk) as count FROM nasa.asteroid";
        $result =  $this->db->query($sql)->row_array();
        return $result['count'];
    }

    function search($where, $data_array)
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM nasa.asteroid ";
        if (!empty($where) && is_array($data_array))
        {
            $sql .= $where;
        }

        $result = $this->db->query($sql,$data_array)->result_array();

        $num_rows = $this->db->query("SELECT FOUND_ROWS() AS num_results")->row()->num_results;

        return array($result, $num_rows);
    }

    function get_distinct_spec_types(){
        $sql = "SELECT DISTINCT spec_type_smassi FROM asteroid";
        $result = $this->db->query($sql, array())->result_array();
        foreach($result as $row)
        {
            if (isset($row['spec_type_smassi']) && !empty($row['spec_type_smassi']))
            {
                $smassi_array[$row['spec_type_smassi']] = $row['spec_type_smassi'];
            }
        }

        $sql = "SELECT DISTINCT spec_type_tholen FROM asteroid";
        $result = $this->db->query($sql, array())->result_array();
        foreach($result as $row)
        {
            if (isset($row['spec_type_tholen']) && !empty($row['spec_type_tholen']))
            {
                $tholen_array[$row['spec_type_tholen']] = $row['spec_type_tholen'];
            }
        }

        $type_array = array_merge($smassi_array,$tholen_array);
        return $type_array;
    }


}