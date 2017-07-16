<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reviewers_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        $this->load->database();
    }

    function get_reviewer_by_amazon_id($amazon_user_id) {
        $this->db->where('amazon_user_id', $amazon_user_id);
        $query = $this->db->get('reviewers');
        return $query->result();
    }

    function check_reviewer_by_amazon_id($amazon_user_id) {
        $this->db->where('amazon_user_id', $amazon_user_id);
        $query = $this->db->get('reviewers');
        return $query->num_rows();
    }

    function insert_data($data) {
        $this->db->insert('reviewers', $data);
    }

    function update_data($amazon_reviewer_id, $data) {
        $this->db->where('amazon_user_id', $amazon_reviewer_id);
        $this->db->update('reviewers', $data);
    }

    function insert_customer_reviews($data)
    {
        $this->db->insert('reviews',$data);
    }
    
    function getAllReviewers()
    {
    	$query=$this->db->query('SELECT * FROM reviewers ORDER BY id DESC');
    	return $query;
    }
    
    function get_customer_reviews($reviewer_id)
    {
    	$this->db->where('reviewer_id',$reviewer_id);
    	$query=$this->db->get('reviews');
    	return $query;
    }
    
    public function reviews_count($reviewer_id) {
    	
    	$this->db->where('reviewer_id',$reviewer_id);
        $query=$this->db->get('reviews');
        return $query->num_rows();
    }

    public function fetch_customer_reviews($limit, $start,$reviewer_id) {
    	$this->db->where('reviewer_id',$reviewer_id);
        $this->db->limit($limit, $start);
        $query = $this->db->get("reviews");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

}

?>