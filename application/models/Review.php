<?php
Class Review extends CI_Model
{
    function get_last_10_reviews($lat,$lng)
    {

		$lat = bcdiv($lat, 1, 2); 
		$lng = bcdiv($lng, 1, 2);      
   
        $query  = $this->db->query('select full_name,avatar,info,time from tbl_users,tbl_reviews where tbl_users.uid = tbl_reviews.uid and tbl_reviews.lat like \''.$lat.'%\' and tbl_reviews.lng like \''.$lng.'%\'');
        return $query->result();
    }

    function getAllReviews()
    {

    	$query  = $this->db->query('select full_name,avatar,info,time,review_id from tbl_users,tbl_reviews where tbl_users.uid = tbl_reviews.uid');
        return $query->result();
    }
}
