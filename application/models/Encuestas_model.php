<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function login($data){
		$this->db->where('user',$data['nombre']);
		$this->db->where('password',md5($data['contrasena']));
		$q = $this->db->get('login');
		if($q->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function insertaPregunta($data){
		$this->db->insert('reactivos',array('pregunta'=>$data['pregunta']));
	}
	function insertarRegistro($data){
		$this->db->insert('login',array('user'=>$data['nombre'],'password'=>md5($data['contrasena']),'apellido'=>$data['apellido'],'email'=>$data['email']));
	}
}

?>