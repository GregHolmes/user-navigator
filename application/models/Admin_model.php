<?php
Class Admin_model extends CI_Model
{


    function getAllUsers()
    {
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

 
    function getAllReviews()
    {

        $query  = $this->db->query('select full_name,avatar,info,time,review_id from tbl_users,tbl_reviews where tbl_users.uid = tbl_reviews.uid');
        return $query->result();
    }

    function getAllMarkers()
    {

        $query  = $this->db->query('select full_name,avatar,info,added_time,marker_id from tbl_users,tbl_markers where tbl_users.uid = tbl_markers.uid');
        return $query->result();
    }

    function getAllPolylines()
    {

        $query  = $this->db->query('select full_name,avatar,description,timestamp,polyline_id from tbl_users,tbl_polylines where tbl_users.uid = tbl_polylines.uid ORDER BY polyline_id ASC');
        return $query->result();
    }

    function deletepath($id)
    {
        $this->db->where('polyline_id', $id);
        $this->db->delete('tbl_polylines'); 
        
        return $this->db->affected_rows();
    }

    function deletemarker($id)
    {
        $this->db->where('marker_id', $id);
        $this->db->delete('tbl_markers'); 
        
        return $this->db->affected_rows();
    }

    function deletereview($id)
    {
        $this->db->where('review_id', $id);
        $this->db->delete('tbl_reviews'); 
        
        return $this->db->affected_rows();
    } 
}
