<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function insertaPregunta($data){
		$this->db->insert('reactivos',array('pregunta'=>$data['pregunta']));
	}
	function insertarRegistro($data){
		$this->db->insert('login',array('user'=>$data['nombre'],'password'=>md5($data['contrasena']),'apellido'=>$data['apellido'],'email'=>$data['email'],'tipoUsuario'=>$data['tipoUsuario']));
	}

	function obtenerDatos(){
		$query = $this->db->get("estudios");
		return $query;
	}

	function getEncuesta(){
		$this->db->order_by('nombre','asc');
		$estudios = $this->db->get('estudios');

		if ($estudios->num_rows() > 0){
			return $estudios->result();
		}
	}
	

	function getEncuestaLogin($data){
		$this->db->where('idLogin',$data['idLogin']);
		$estudios = $this->db->get('asignarestudio');
		if ($estudios->num_rows() > 0){
			return $estudios->result();
		}
	}

	function getEstudioId($data){
		print_r($data);
		$this->db->where('idLogin',$data['idLogin']);
	}
}

?>