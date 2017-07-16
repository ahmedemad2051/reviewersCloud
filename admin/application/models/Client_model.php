<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->database();
    }

    function insert_data($data) {
        $this->db->insert('clients', $data);
    }

    function list_clients($limit,$start)
    {
        $this->db->limit($limit,$start);
        $clients=$this->db->get('clients');
        return $clients;
    }

    function clients_count()
    {
        return $this->db->count_all('clients');
    }

    function getClient($id)
    {
        $this->db->where('id',$id);
        $client=$this->db->get('clients');
        return $client;
    }

    function update_data($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('clients', $data);
    }

    function delete_client($id) {
        $this->db->where('id',$id);
        $this->db->delete('clients');
    }

}
?>