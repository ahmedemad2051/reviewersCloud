<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Campaign_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->database();
    }

    function insert_data($data) {
        $this->db->insert('campaigns', $data);
        return $this->db->insert_id();
    }

    function list_campaigns($limit,$start)
    {
        $this->db->limit($limit,$start);
        $campaigns=$this->db->get('campaigns');
        return $campaigns;
    }

    function campaigns_count()
    {
        return $this->db->count_all('campaigns');
    }

    function getCampaign($id)
    {
        $this->db->where('id',$id);
        $campaign=$this->db->get('campaigns');
        return $campaign->result()[0];
    }

    function update_data($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('campaigns', $data);
    }

    function delete_campaign($id) {
        $this->db->where('id',$id);
        $this->db->delete('campaigns');
    }



}
?>