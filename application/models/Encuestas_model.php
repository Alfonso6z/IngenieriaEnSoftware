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
		$this->db->select('idEstudio')->from('asignarestudio')->where('idLogin',$data['idLogin']);
		$this->db->select('idAsignacion')->where('idLogin',$data['idLogin']);
		$estudios = $this->db->get();
		if ($estudios->num_rows() > 0){
			return $estudios->result();
		}
	}

	function getEncuestaLogin2($data,$data2){
		$datos = array();
		foreach ($data2 as $i) {
			$datos[]=$i->idEstudio;
		}
		$this->db->order_by('idAsignacion','desc');
		$this->db->where('idLogin',$data['idLogin']);
		$this->db->where('idEstudio',$datos[0]);
		$asignacion = $this->db->get('asignarestudio');
		if ($asignacion->num_rows() > 0){
			return $asignacion->result();
		}
	}

	function getEstudioId($data){
		$datos=array();
		$value = (array) $data['idEstudio'];
		foreach ($value as $i) {
			$datos[]=$i->idEstudio;
		}
		if($datos){
			$this->db->where_in('idEstudio',$datos);
			$estudios = $this->db->get('estudios');
			if ($estudios->num_rows() > 0){
			return $estudios->result();
			}
		}	
	}

	function getEstudioNombre($data){
		$this->db->where('idEstudio',$data['idEstudio']);
		$estudio = $this->db->get('estudios');
		if($estudio->num_rows()>0){
			return $estudio->result();
		}
	}
	function getCuestionarios($data){
		$this->db->where('idEstudio',$data['idEstudio']);
		$this->db->order_by('cuenombre','asc');
		$cuestionarios = $this->db->get('cuestionarios');
		if($cuestionarios->num_rows()>0){
			return $cuestionarios->result();
		}
	}
	function cuestionariosSelect($data){
		print_r($data);
		$this->db->select('idCuestionario')->from('asignarestudio')->where('idEstudio',$data['idEstudio']);
		$estudios = $this->db->get();
		if ($estudios->num_rows() > 0){
		return $estudios->result();
		}
	}

	function cuestionarioNombre($data){
		print_r($data);
		$datos = array();
		foreach ($data as $i) {
			$datos[]=$i->idCuestionario;
		}
		$this->db->where_in('idCuestionario',$datos);
		$estudios = $this->db->get('cuestionarios');
		if ($estudios->num_rows() > 0){
			return $estudios->result();
		}
	}

	function getReactivosCuestionario($data,$dataC){
		$this->db->where('idCuestionario',$data['idCuestionario']);
		if($dataC){
			$datos = array();
			foreach ($dataC as $i) {
				$datos[]=$i->idReactivo;
			}
			$this->db->where_not_in('idReactivo',($datos));
		}
		$this->db->order_by('idReactivo','desc');
		$reactivos = $this->db->get('reactivos');
		if($reactivos->num_rows()>0){
			return $reactivos->result();
		}
	}
	function getRespuestas(){
		$respuestas = $this->db->get('respuestas');
		if($respuestas->num_rows()>0){
			return $respuestas->result();
		}
	}

	function getPreguntasContestadas($asig){
		$this->db->order_by('idReactivo','asc');
		$this->db->where('idAsignacion',$asig->idAsignacion );
		$cuestionarioContestado = $this->db->get('cuestionarioContestado');
		if ($cuestionarioContestado->num_rows() > 0){
			return $cuestionarioContestado->result();
		}
	}
	function dameNombre($data){
		$this->db->where('idCuestionario',$data['idCuestionario']);
		$estudios = $this->db->get('cuestionarios');
		if ($estudios->num_rows() > 0){
			return $estudios->result();
		}
	}
	
	function insertarRespuesta($respuestas,$reactivo,$asignacion){
		echo $asignacion->idAsignacion;
		$this->db->insert('cuestionarioContestado',array('idAsignacion'=>$asignacion->idAsignacion,'idReactivo'=>$reactivo['idReactivo'],'respuesta'=>$respuestas['respuesta']));
	}

	function getAsignacion($data,$data1){
		$this->db->where('idLogin',$data['idLogin']);
	}

	function eliminaAsignacion($data){
		$query= $this->db->query("SET foreign_key_checks = 0;");
		$this->db->delete('asignarestudio',array('idAsignacion'=>$data->idAsignacion));
		$query= $this->db->query("SET foreign_key_checks = 1;");
	}
}

?>