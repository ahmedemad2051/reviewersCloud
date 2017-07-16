<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Marketplaces_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->database();
    }

    function get_all_marketplaces() {
        $this->db->order_by('id');
        $query = $this->db->get('marketplaces');
        return $query->result();
    }

}
?>