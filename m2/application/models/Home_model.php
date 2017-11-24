<?php
 
class Home_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get all m_promo count
     */
    function get_all_m_promo()
    {
        $this->db->select('*');
        $this->db->where('level_promo', 0);
        $this->db->order_by('id_promo');
        return $this->db->get('m_promo')->result_array();
    }
    function get_all_m_promo_special()
    {
        $this->db->select('*');
        $this->db->where('level_promo', 1);
        $this->db->order_by('id_promo');
        return $this->db->get('m_promo')->result_array();
    }
    function get_all_m_photo_atas()
    {
        $this->db->select('*');
        $this->db->order_by('id_photo');
        $this->db->where('letak_photo', '1');
        return $this->db->get('m_photo')->result_array();
    }
    function get_all_m_photo_bawah()
    {
        $this->db->select('*');
        $this->db->order_by('id_photo');
        $this->db->where('letak_photo', '0');
        return $this->db->get('m_photo')->result_array();
    }
    
}
