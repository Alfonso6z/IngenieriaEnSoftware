<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function login($data){
		$this->db->where('email',$data['email']);
		$this->db->where('password',md5($data['contrasena']));
		$q = $this->db->get('login');
		if($q->num_rows()>0){
			return $q->row(); 
		}else{
			return false;
		}
	}

	public function existeCorreo($dataCorreo){
		$this->db->where('email',$dataCorreo['email']);
		$q1 = $this->db->get('login');
		if($q1->num_rows()>0){
			return $q1->row(); 
		}else{
			return false;
		}
	}

	function actualizarPassword($data){
		$datos = array(
			'password'=> md5($data['password']));
		$this->db->where('email',$data['email']);
		$query = $this->db->update('login',$datos);
	}
}
?>