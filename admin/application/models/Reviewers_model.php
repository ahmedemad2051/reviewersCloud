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

    function insert_data($data){
        $this->db->insert('reviewers', $data); 
    }
}
?>