<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->database();
    }

    //get the username & password from table users
    function clients() {
        $query = $this->db->get('clients');
        
        return $query->result();
    }

}
?>