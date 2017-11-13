<?php
/**
 * @author SAKZEDMK
 * @param $idUser PARA ASIGNAR LOS PERMISOS DENTRO DEL SISTEMA, SEGUN EL USUARIO
 */
 
class Users_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function consultar_permisos($idUser)
    {
    	$query="SELECT CONCAT(users.first_name,' ',users.last_name) as Usuario,users.id as idUser,groups.id as idGrupo,groups.name as nombreGrupo
				FROM users
				JOIN users_groups ON users_groups.user_id = users.id
				JOIN groups ON users_groups.group_id = groups.id
				WHERE users.id=".$idUser;
    	return $this->db->query($query)->row_Array();
    }

}