<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function creaDept($data){
		$this->db->insert('login',array('user'=>$data['nombre'],'password'=>$data['contrasena']));
	}
	function insertaPregunta($data){
		$this->db->insert('reactivos',array('pregunta'=>$data['pregunta']));
	}
	function insertarRegistro($data){
		$this->db->insert('login',array('user'=>$data['nombre'],'password'=>$data['contrasena'],'apellido'=>$data['apellido'],'email'=>$data['email']));
	}
}

?>