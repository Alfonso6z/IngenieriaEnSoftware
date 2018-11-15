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
		$this->db->insert('cuestionarios', array('cuenombre'=>$data['nombre'], 'idEstudio'=>$data['idEstudio']));
	}
	function insertaReactivo($data){
		$this->db->insert('reactivos',array('pregunta'=>$data['pregunta'], 'IDcuestionario'=>$data['IDcuestionario']));
	}
	function insertaRespuesta($data){
		$this->db->insert('respuestas',array('resnombre'=>$data['respuesta'], 'idReactivo'=>$data['idReactivo']));
	}
	function obtenerDatos(){
		$query = $this->db->get("estudios");
		return $query;
	}
	
	function asignarParti($data){
	    $this->db->insert('asignarestudio', array('rol'=>$data['rolusuario'], 'nomestudio'=>$data['nomestudio']));
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
	function getReactivo(){
		$this->db->order_by('pregunta','asc');
		$reactivos = $this->db->get('reactivos');

		if ($reactivos->num_rows() > 0){
			return $reactivos->result();
		}
	}

	function getTipoReactivo(){
		$this->db->order_by('nombre','asc');
		$tipoReactivos = $this->db->get('tiporeactivo');
		if ($tipoReactivos->num_rows() > 0){
			return $tipoReactivos->result();
		}
	}


}

?>