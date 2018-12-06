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

	function insertaAsignacion($data){
		$this->db->insert('asignarestudio', array('idLogin'=>$data['idLogin'], 'idEstudio'=>$data['idEstudio']));
	}

	function insertaReactivo($data){
		$this->db->insert('reactivos',array('pregunta'=>$data['pregunta'], 'idCuestionario'=>$data['idCuestionario'], 'idTipoReactivo'=>$data['TipoReactivo']));
	}
	function insertaRespuesta($data){
		$this->db->insert('respuestas',array('respuesta'=>$data['respuesta'], 'idReactivo'=>$data['idReactivo']));
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
	
	function getCuestionarioAsignados(){
		$this->db->order_by('cuenombre','asc');
		$cuestionarios = $this->db->get('cuestionarios');
		$estudios = $this->db->get('estudios');

		if (($cuestionarios->num_rows() > 0)){
			return $cuestionarios->result();
		}
	}

	function getEncuestadores(){
		$this->db->order_by('rol','asc');
		$encuestador = $this->db->get('login');

		if ($encuestador->num_rows() > 0){
			return $encuestador->result();
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
	function actualizaReactivo($data){
		$datos = array(
			'pregunta'=> $data['pregunta'],
			'idReactivo' => $data['idReactivo']
			);
		$this->db->where('idReactivo',$data['idReactivo']);
		$query = $this->db->update('reactivos',$datos);
	}

	function eliminaReactivo($data){
		$datos = array(
			'idReactivo' => $data['idReactivo']
			);
		$this->db->delete('reactivos',$datos);
	}

	function actualizaCuestionario($data){
		$datos = array(
			'cuenombre'=> $data['cuenombre'],
			'idCuestionario' => $data['idCuestionario']
			);
		$this->db->where('idCuestionario',$data['idCuestionario']);
		$query = $this->db->update('cuestionarios',$datos);
	}
	function eliminarCuestionario($data){
		$query= $this->db->query("SET foreign_key_checks = 0;");
		$datos = array(
			'idCuestionario' => $data['idCuestionario']
			);
		$this->db->delete('reactivos',array(
			'idCuestionario' => $data['idCuestionario']
			));
		$this->db->delete('cuestionarios',$datos);
		$query= $this->db->query("SET foreign_key_checks = 1;");
	}

	function getRespuestas($data) {
        $datos = array(
			'idReactivo' => $data['idReactivo']
			);
		$this->db->where('idReactivo',$datos['idReactivo']);
        $respuestas = $this->db->get('respuestas');

        if($respuestas->num_rows() > 0){
            return $respuestas->result();
        }
    }
	
	function getRoles(){
		$this->db->order_by('idRol','asc');
		$roles = $this->db->get('roles');

		if ($roles->num_rows() > 0){
			return $roles->result();
		}
	}

	function getEstudio() {
        $this->db->order_by('nombre', 'asc');
        $Estudios = $this->db->get('estudios');
        
        if($Estudios->num_rows() > 0){
            return $Estudios->result();
        }
	}

	function eliminarEstudio($data){
		$datos = array(
			'idEstudio' => $data['idEstudio']
			);
		$this->db->delete('estudios',$datos);
	}

	function actualizarEstudio($data){
		$datos = array(
			'nombre'=> $data['nombre'],
			'idEstudio' => $data['idEstudio']
			);
		$this->db->where('idEstudio',$data['idEstudio']);
		$query = $this->db->update('estudios',$datos);
	}
    function getCuestionarioEstudio($data){
    	$datos = array(
			'idEstudio' => $data['idEstudio']
			);
		$this->db->where('idEstudio',$datos['idEstudio']);
        $cuestionarios = $this->db->get('cuestionarios');

        if($cuestionarios->num_rows() > 0){
            return $cuestionarios->result();
        }
	}
	//getcuestionarioestudio
	function getRolUsuario($data){
    	$datos = array(
			'rol' => $data['rol']
			);
		$this->db->where('rol',$datos['rol']);
        $usuario = $this->db->get('login');

        if($usuario->num_rows() > 0){
            return $usuario->result();
        }
    }

    function getReactivoCuestionario($data){
    	$datos = array(
			'idCuestionario' => $data['idCuestionario']
			);
		$this->db->where('idCuestionario',$datos['idCuestionario']);
        $reactivos = $this->db->get('reactivos');

        if($reactivos->num_rows() > 0){
            return $reactivos->result();
        }
	}
	
	function getEncuestadorCuestionario($data){
    	$datos = array(
			'idCuestionario' => $data['idCuestionario']
			);
		$this->db->where('idCuestionario',$datos['idCuestionario']);
        $reactivos = $this->db->get('asignarestudio');
        if($reactivos->num_rows() > 0){
            return $reactivos->result();
        }
    }

    function actualizarRespuesta($data){
		$datos = array(
			'respuesta'=> $data['respuesta'],
			'idRespuesta' => $data['idRespuesta']
			);
		$this->db->where('idRespuesta',$data['idRespuesta']);
		$query = $this->db->update('respuestas',$datos);
	}

	function eliminarRespuesta($data){
		$query= $this->db->query("SET foreign_key_checks = 0;");
		$datos = array(
			'idRespuesta' => $data['idRespuesta']
			);
		$this->db->delete('respuestas',$datos);
		$query= $this->db->query("SET foreign_key_checks = 1;");
	}

	function eliminarAsignacion($data){
		$query= $this->db->query("SET foreign_key_checks = 0;");
		$datos = array(
			'idLogin' => $data['idLogin']
			);
		$this->db->delete('asignarestudio',$datos);
		$query= $this->db->query("SET foreign_key_checks = 1;");
	}

	function estudioSelect($data){
		print_r($data);
		$this->db->select('idLogin')->from('asignarestudio')->where('idEstudio',$data['idEstudio']);
		$estudios = $this->db->get();
		if ($estudios->num_rows() > 0){
		return $estudios->result();
		}
	}

	function estudioNombre($data){
		$datos = array();
		foreach ($data as $i) {
			$datos[]=$i->idLogin;
		}
		$this->db->where_in('idLogin',$datos);
		$estudios = $this->db->get('login');
		if ($estudios->num_rows() > 0){
			return $estudios->result();
		}
	}
}
?>