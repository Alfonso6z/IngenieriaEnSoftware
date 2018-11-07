<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function login($data){
		$this->db->where('user',$data['nombre']);
		$this->db->where('password',md5($data['contrasena']));
		$q = $this->db->get('login');
		if($q->num_rows()>0){
			return $q->row(); 
		}else{
			return false;
		}
	}
}
?>