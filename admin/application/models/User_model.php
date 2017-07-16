<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->database();
    }

    //get the username & password from table users
    function get_user() {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $this->db->where('type', '1');
        $query = $this->db->get('users');
        
        return $query->num_rows();
    }
    
    function insert_data($data) {
        $this->db->insert('users', $data);
    }

    function list_users($limit,$start)
    {
        $this->db->limit($limit,$start);
        $users=$this->db->get('users');
        return $users;
    }

    function users_count()
    {
        return $this->db->count_all('users');
    }


    function getUser($id)
    {
        $this->db->where('id',$id);
        $user=$this->db->get('users');
        return $user;
    }

    function getUserByEmail($email)
    {
        $this->db->where('email',$email);
        $user=$this->db->get('users');
        return $user;
    }

    function update_data($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('users', $data);
    }

    function delete_user($id) {
        $this->db->where('id',$id);
        $this->db->delete('users');
    }

}
?>