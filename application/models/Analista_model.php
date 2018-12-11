<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analista_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database(); 
	}
	function obtenerDatosE(){
		$query = $this->db->get("estudios");
		return $query;
	}
	function obtenerDatos(){
		$query = $this->db->get("cuestionarios");
		return $query;
	}

	function getEncuesta(){
		$this->db->order_by('nombre','asc');
		$estudios = $this->db->get('estudios');

		if ($estudios->num_rows() > 0){
			return $estudios->result();
		}
	}

	function getCuestionario(){
		$this->db->order_by('cuenombre','asc');
		$cuestionarios = $this->db->get('cuestionarios');

	if ($cuestionarios->num_rows() > 0){
			return $cuestionarios->result();
		}
	}

	function getEstudiosAna(){
		$this->db->select('nombre, descripcion');
		$this->db->from('estudios');
		$query = $this->db->get();			
		return $query;
	}


}