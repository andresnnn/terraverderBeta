<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Umbraculos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get umbraculos by idUmbraculo
     */
    function get_umbraculos($idUmbraculo)
    {
        return $this->db->get_where('umbraculo',array('idUmbraculo'=>$idUmbraculo))->row_array();
    }

 
    /*
     * Get all umbraculos
     */
    function get_all_umbraculos()
    {
        $this->db->order_by('idUmbraculo', 'desc');
        return $this->db->get('umbraculo')->result_array();
    }
        
    /*
     * function to add new umbraculos
     */
    function add_umbraculos($params)
    {
        $this->db->insert('umbraculo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update umbraculos
     */
    function update_umbraculos($idUmbraculo,$params)
    {
        $this->db->where('idUmbraculo',$idUmbraculo);
        return $this->db->update('umbraculo',$params);
    }
    
    /*
     * function to delete umbraculos
     */
    function delete_umbraculos($idUmbraculo)
    {
        return $this->db->delete('umbraculo',array('idUmbraculo'=>$idUmbraculo));
    }

    function retirar_planta_umbraculo($idUmbraculo,$idPlanta)
    {
        $query="DELETE FROM `umbraculo/planta` WHERE idPlanta = ".$idPlanta." AND idUmbraculo =".$idUmbraculo;
        return $this->db->query($query)->result_array();
    }
}