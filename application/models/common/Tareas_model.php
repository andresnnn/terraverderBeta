<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Tareas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get tareas by idTarea
     */
    function get_tareas($idTarea)
    {
        return $this->db->get_where('tarea',array('idTarea'=>$idTarea))->row_array();
    }

    /*
     * Get all tareas
     */
    function get_all_tareas()
    {
        $this->db->order_by('idTarea', 'desc');
        return $this->db->get('tarea')->result_array();
    }

    /**
     * RETORNA EL LISTADO DE LAS TAREAS (CON UN LIMITE DE TRES ELEMENTOS, PARA SU PRESENTACIÓN EN EL "VER UMBRACULO")
     * JUNTO CON EL JOIN DE TODOS LOS CAMPOS RELACIONADOS A UNA TAREA.
     * @param  [type] $idUmbraculo EL UMBRACULO SELECCIONADO SOBRE EL CUAL SE REALIZA LA CONSULTA
     * @return [type]              [description]
     * @author SAKZEDMK
     */
    function obtener_tareas_umbraculo($idUmbraculo)
    {
        $query ="SELECT tt.nombreTipoTarea,et.nombreEstado,t.fechaComienzo,p.nombrePlanta,t.idTarea, CONCAT(u.first_name,' ',u.last_name) AS creador
                    FROM tarea t
                    JOIN tipotarea tt ON t.idTipoTarea = tt.idTipoTarea
                    JOIN estado_tarea et ON t.idEstado= et.idEstado
                    JOIN users u ON t.idUserCreador = u.id
                    JOIN planta p ON t.idPlanta = p.idPlanta
                    WHERE t.idUmbraculo=".$idUmbraculo." ORDER BY t.fechaCreacion DESC LIMIT 0,3";
        return $this->db->query($query)->result_array();
    }

    function comprobar_existencia_tarea($id1, $id2, $id3,$id4)
    {
//AND (fechaComienzo=".$id2.")
        $hoy = getdate(); $d = $hoy['mday']; $M = $hoy['mon']; $y = $hoy['year'];
        echo $id2;
        if ($id2==null){
        $query ="SELECT * FROM `tarea` WHERE (idUmbraculo=".$id1.")  AND (idPlanta= ".$id3.") AND (fechaComienzo='.$id2.') AND (idTipoTarea= ".$id4." )";
        return $this->db->query($query)->row_array();
        }
        else {
          return null;
        }

    }


    /**
     * RETORNA EL LISTADO DE TODAS LAS TAREAS PERTENECIENTES A UM UMBRACULO
     * JUNTO CON EL JOIN DE TODOS LOS CAMPOS RELACIONADOS A UNA TAREA.
     * @param  [type] $idUmbraculo EL UMBRACULO SELECCIONADO SOBRE EL CUAL SE REALIZA LA CONSULTA
     * @return [type]              [description]
     * @author SAKZEDMK
     */
    function listar_tareas_umbraculo($idUmbraculo)
    {
        $query ="SELECT tt.nombreTipoTarea,et.nombreEstado,t.fechaCreacion,p.nombrePlanta,t.idTarea, CONCAT(u.first_name,' ',u.last_name) AS creador
                    FROM tarea t
                    JOIN tipotarea tt ON t.idTipoTarea = tt.idTipoTarea
                    JOIN estado_tarea et ON t.idEstado= et.idEstado
                    JOIN users u ON t.idUserCreador = u.id
                    JOIN planta p ON t.idPlanta = p.idPlanta
                    WHERE t.idUmbraculo=".$idUmbraculo." ORDER BY t.fechaCreacion DESC";
        return $this->db->query($query)->result_array();
    }

    /*
     * function to add new tareas
     */
    function add_tareas($params)
    {

        $this->db->insert('tarea',$params);
        //$this->db->query($query);
        return $this->db->insert_id();
    }

    /*
     * function to update tareas
     */
    function update_tareas($idTarea,$params)
    {
        $this->db->where('idTarea',$idTarea);
        return $this->db->update('tarea',$params);
    }

    /*
     * function to delete tareas
     */
    function delete_tareas($idTarea)
    {
        return $this->db->delete('tarea',array('idTarea'=>$idTarea));
    }
}
