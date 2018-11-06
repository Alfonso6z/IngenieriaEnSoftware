<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEncuesta_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function insertaEstudio($data){
		$this->db->insert('estudios',array('nombre'=>$data['nombre'],'descripcion' => $data['descripcion'])); 
	}
	function insertaCuestionario($data){
		$this->db->insert('cuestionarios', array('cuenombre'=>$data['nombre']) );
	}
	function insertaReactivo($data){
		$this->db->insert('reactivos',array('pregunta'=>$data['pregunta']));
	}
	function obtenerDatos(){
		$query = $this->db->get("estudios");
		return $query;
	}
}

?>