<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Plantas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get planta by idPlanta
     */
    function get_planta($idPlanta)
    {
        return $this->db->get_where('planta',array('idPlanta'=>$idPlanta))->row_array();
    }
        
    /*
     * Get all plantas
     */
    function get_all_plantas()
    {
        $this->db->order_by('idPlanta', 'desc');
        return $this->db->get('planta')->result_array();
    }
        
    /*
     * function to add new planta
     */
    function add_planta($params)
    {
        $this->db->insert('planta',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update planta
     */
    function update_planta($idPlanta,$params)
    {
        $this->db->where('idPlanta',$idPlanta);
        return $this->db->update('planta',$params);
    }
    
    /*
     * function to delete planta
     */
    function delete_planta($idPlanta)
    {
        return $this->db->delete('planta',array('idPlanta'=>$idPlanta));
    }
}