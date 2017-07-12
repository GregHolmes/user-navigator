<?php
Class Map_model extends CI_Model
{
    function get_markers()
    {
        $query = $this->db->get('tbl_markers');
        return $query->result();
    }

    function get_polylines()
    {
        $query = $this->db->get('tbl_polylines');
        return $query->result();
    }

    function savepath($data)
    {
        $this->db->insert('tbl_polylines', $data);
        return $this->db->insert_id();
    }

    function savemarker($data)
    {
        $this->db->insert('tbl_markers', $data);
        return $this->db->insert_id();
    }
}
