<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSistema_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function insertarRegistro($data){
		$this->db->insert('login',array('user'=>$data['nombre'],'password'=>md5($data['contrasena']),'apellido'=>$data['apellido'],'email'=>$data['email'],'rol'=>$data['tipoUsuario']));
	}

	function getRoles(){
		$this->db->order_by('idRol','asc');
		$roles = $this->db->get('roles');

		if ($roles->num_rows() > 0){
			return $roles->result();
		}
	}
	function getTreactivos(){
		$this->db->order_by('nombre','asc');
		$tiporeactivo = $this->db->get('tiporeactivo');

		if ($tiporeactivo->num_rows() > 0){
			return $tiporeactivo->result();
		}
	}

	function insertarTipoUsuario($data){
		$this->db->insert('roles',array('idRol'=>$data['nombre']));
	}

	function actualizaTipoDeUsuario($data){
		$datos = array(
			'idRol'=> $data['nombre']);
		$this->db->where('idRol',$data['tipoUsuario']);
		$query = $this->db->update('roles',$datos);

	}
	function eliminaTipoDeUsuario($data){
		$datos = array(
			'idRol'=> $data['idRol']);
		$this->db->delete('roles',$datos);
	}
	function insertarTipoReactivo($data){
		$this->db->insert('tiporeactivo',array('nombre'=>$data['nombre']));
	}
	function actualizaTipoDeReactivo($data){
		$datos = array(
			'nombre'=> $data['nombre']);
		$this->db->where('nombre',$data['tipoReactivo']);
		$query = $this->db->update('tiporeactivo',$datos);

	}
	function eliminaTipoDeReactivo($data){
		$datos = array(
			'nombre'=> $data['nombre']);
		$this->db->delete('tiporeactivo',$datos);
	}


	function getUsuario(){
		$this->db->order_by('user','asc');
		$user = $this->db->get('login');

		if ($user->num_rows() > 0){
			return $user->result();
		}
	}

	function actualizaUsuario($data){
		$datos = array(
			'user'=>$data['nombre'],'apellido'=>$data['apellido'],'email'=>$data['email'],'rol'=>$data['tipoUsuario']
			);
		$this->db->where('idLogin',$data['idLogin']);
		$query = $this->db->update('login',$datos);
	}
}

?>