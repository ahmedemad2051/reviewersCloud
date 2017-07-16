<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Amazon_categories_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->database();
    }

    function get_all_categories() {
        $this->db->order_by('category');
        $query = $this->db->get('amazon_categories');
        return $query->result();
    }

}
?>