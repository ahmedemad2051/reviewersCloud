<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Offer_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->database();
    }

    function insert_data($data) {
        $this->db->insert('offers', $data);
    }

    function list_offers($limit,$start,$campaign_id)
    {
        $this->db->where('campaign_id',$campaign_id);
        $this->db->limit($limit,$start);
        $offers=$this->db->get('offers');
        return $offers;
    }

    function offers_count($id)
    {
        $this->db->where('campaign_id',$id);
        return $this->db->count_all('offers');
    }

    function getOffer($id)
    {
        $this->db->where('id',$id);
        $offer=$this->db->get('offers');
        return $offer->result()[0];
    }

    function update_data($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('offers', $data);
    }

    function delete_offer($id) {
        $this->db->where('id',$id);
        $this->db->delete('offers');
    }


}
?>