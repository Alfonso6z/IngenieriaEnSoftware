<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSistema_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function insertarRegistro($data){
		$this->db->insert('login',array('user'=>$data['nombre'],'password'=>md5($data['contrasena']),'apellido'=>$data['apellido'],'email'=>$data['email'],'tipoUsuario'=>$data['rol']));
	}
}

?>