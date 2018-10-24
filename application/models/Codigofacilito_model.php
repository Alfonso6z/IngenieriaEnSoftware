<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofacilito_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function creaDept($data){
		$this->db->insert('Registro',array('nombre'=>$data['nombre'],'pass'=>$data['contrasena']));
	}
}

?>