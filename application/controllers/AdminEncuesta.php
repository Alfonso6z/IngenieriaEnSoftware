<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEncuesta extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('AdminEncuesta_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->view('encuestas/adminEncuesta/headerAdminEncuesta');
		if (!$this->session->userdata("login")){
			redirect(site_url('login',NULL));
		}
		else if($this->session->userdata('rol')!='AdminEncuesta'){
			redirect(site_url('login/logout',NULL));
		}
	}

 	public function index(){
		$this->load->view('encuestas/adminEncuesta/inicioAdminEncuesta');
	}
//Estudios
	public function vista_estudios(){
		$data['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();	
		$this->load->view('encuestas/adminEncuesta/altaCuestionario',$data);
	} 

	public function altaEstudio(){
		$this->load->view('encuestas/adminEncuesta/altaEstudio');
	}

	public function recibirDatosEstudio(){
		$this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'required|min_length[1]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');

		if($this->form_validation->run()!=false){ 
			$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'));
			$datos["correcto"]="Estudio regirtrado";
			$this->AdminEncuesta_model->insertaEstudio($data);
			$this->load->view('encuestas/adminEncuesta/altaEstudio',$datos);
		}else{
			$datos["error"]="ERROR EN EL REGISTRO";
            $this->load->view('encuestas/adminEncuesta/altaEstudio',$datos);

		}	
	}

	public function actualizarEstudio(){
		$data['idEstudio'] = $this->AdminEncuesta_model->getEstudio();
		$this->load->view('encuestas/adminEncuesta/actualizarEstudio',$data);
	}
	
	public function modificarEstudio(){
		$data['idEstudio'] = $this->AdminEncuesta_model->getEstudio();
		$this->form_validation->set_rules('nombre', 'Pregunta', 'required|is_unique[reactivos.pregunta]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Estudio modificado";
			$data1 = array(
				'nombre' => $this->input->post('nombre'),
				'idEstudio'=> $this->input->post('idEstudio'));
			$this->AdminEncuesta_model->actualizarEstudio($data1);
			$data['idEstudio'] = $this->AdminEncuesta_model->getEstudio();
			$this->load->view('encuestas/adminEncuesta/actualizarEstudio',$datos+$data);
		}else{
			$datos["error"]="ERROR AL MODIFICAR";
            	$this->load->view('encuestas/adminEncuesta/actualizarEstudio',$datos+$data);
		}
	}

	public function eliminarEstudio(){ 
		$data['idEstudio'] = $this->AdminEncuesta_model->getEstudio();
		$this->load->view('encuestas/adminEncuesta/eliminarEstudio',$data);
	}

	public function borrarEstudio(){
		$data['idEstudio'] = $this->AdminEncuesta_model->getEstudio();
		$this->form_validation->set_rules('idEstudio', 'Selecciona Estudio', 'required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){
			$data1 = array(
				'nombre' => $this->input->post('nombre'),
				'idEstudio'=> $this->input->post('idEstudio'));
			$this->AdminEncuesta_model->eliminarEstudio($data1);
			$datos["correcto"]="Estudio eliminado";
			$data['idEstudio'] = $this->AdminEncuesta_model->getEstudio();
			$this->load->view('encuestas/adminEncuesta/eliminarEstudio',$datos+$data);
		}else{
			$datos["error"]="ERROR EN LA ELIMINACIÓN";
            	$this->load->view('encuestas/adminEncuesta/eliminarEstudio',$datos+$data);
		}
	}
//Cuestionarios
	public function altaCuestionario(){
		$data['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/altaCuestionario',$data);
	}

	public function recibirDatosCuestionario(){
		$idEstudio['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idEstudio', 'Selecçiona Estudio', 'required|min_length[1]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array('nombre'=> $this->input->post('nombre'),
                	'idEstudio' => $this->input->post('idEstudio'));
                $datos['correcto'] = 'Cuestionario agregado';
                $this->AdminEncuesta_model->insertaCuestionario($data);
                $this->load->view('encuestas/adminEncuesta/altaCuestionario',$idEstudio+$datos);
             }else{                    
             	$datos['error'] = 'ERROR AL CREAR CUESTIONARIO' ;
                $this->load->view('encuestas/adminEncuesta/altaCuestionario',$idEstudio+$datos);
             }
	}

	public function actualizaCuestionario(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/actualizaCuestionario',$data);
	}

	public function modificarCuestionario(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->form_validation->set_rules('cuenombre', 'Nombre', 'required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Cuestionario modificado";
			$data1 = array(
				'cuenombre' => $this->input->post('cuenombre'),
				'idCuestionario'=> $this->input->post('idCuestionario'));
			$this->AdminEncuesta_model->actualizaCuestionario($data1);
			$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
			$this->load->view('encuestas/adminEncuesta/actualizaCuestionario',$datos+$data);
		}else{
			$datos["error"]="ERROR AL MODIFICAR";
            	$this->load->view('encuestas/adminEncuesta/actualizaCuestionario',$datos+$data);
		}
	}

	public function eliminarCuestionario(){
		$data['idCuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$this->load->view('encuestas/adminEncuesta/eliminarCuestionario',$data);
	}

	public function borrarCuestionario(){
		$data['idCuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$this->form_validation->set_rules('idCuestionario', 'Selecciona Cuestionario', 'required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){
			$data1 = array(
				'nombre' => $this->input->post('nombre'),
				'idCuestionario'=> $this->input->post('idCuestionario'));
			$this->AdminEncuesta_model->eliminarCuestionario($data1);
			$datos["correcto"]="Cuestionario eliminado";
			$data['idCuestionario'] = $this->AdminEncuesta_model->getCuestionario();
			$this->load->view('encuestas/adminEncuesta/eliminarCuestionario',$datos+$data);
		}else{
			$datos["error"]="ERROR EN LA ELIMINACIÓN";
            	$this->load->view('encuestas/adminEncuesta/eliminarCuestionario',$datos+$data);
		}
	}
//Reactivos
	public function altaReactivo(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$tdata['TipoReactivo'] = $this->AdminEncuesta_model->getTipoReactivo();
		$this->load->view('encuestas/adminEncuesta/altaReactivo',$data+$tdata);
	}

	public function recibirDatosReactivo(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$tdata['TipoReactivo'] = $this->AdminEncuesta_model->getTipoReactivo();
		$this->form_validation->set_rules('pregunta', 'Pregunta', 'required|min_length[3]|trim');
		$this->form_validation->set_rules('idCuestionario', 'Selecciona Estudio', 'required|min_length[1]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data1 = array(
					'pregunta' => $this->input->post('pregunta'),
                	'idCuestionario' => $this->input->post('idCuestionario'),
                	'TipoReactivo' => $this->input->post('TipoReactivo'));
                $datos['correcto'] = 'Pregunta agregada' ;
                $this->AdminEncuesta_model->insertaReactivo($data1);
                $this->load->view('encuestas/adminEncuesta/altaReactivo',$data+$datos+$tdata);
             }else{                    
             	$datos['error'] = 'ERROR AL AGREGAR' ;
                $this->load->view('encuestas/adminEncuesta/altaReactivo',$data+$datos+$tdata);
             }	
	}

	public function actualizaReactivo(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/actualizaReactivo',$data);
	}

	public function modificarReactivo(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->form_validation->set_rules('pregunta', 'Pregunta', 'required|is_unique[reactivos.pregunta]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Reactivo modificado";
			$data1 = array(
				'pregunta' => $this->input->post('pregunta'),
				'idReactivo'=> $this->input->post('idReactivo'));
			$this->AdminEncuesta_model->actualizaReactivo($data1);
			$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
			$this->load->view('encuestas/adminEncuesta/actualizaReactivo',$datos+$data);
		}else{
			$datos["error"]="ERROR AL MODIFICAR";
            	$this->load->view('encuestas/adminEncuesta/actualizaReactivo',$datos+$data);
		}
	}

	public function eliminarReactivo(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/eliminarReactivo',$data);
	}

	public function borrarReactivo(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->form_validation->set_rules('idReactivo', 'Selecciona pregunta', 'required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){
			$data1 = array(
				'pregunta' => $this->input->post('pregunta'),
				'idReactivo'=> $this->input->post('idReactivo'));
			$this->AdminEncuesta_model->eliminaReactivo($data1);
			$datos["correcto"]="Pregunta eliminada";
			$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
			$this->load->view('encuestas/adminEncuesta/eliminarReactivo',$datos+$data);
		}else{
			$datos["error"]="ERROR AL ELIMINAR";
            	$this->load->view('encuestas/adminEncuesta/eliminarReactivo',$datos+$data);
		}
	}
//Respuesta
	public function altaRespuesta(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/altaRespuesta',$data);
	}

	public function recibirDatosRespuesta(){
		$data1['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->form_validation->set_rules('respuesta', 'Respuesta', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idReactivo', 'Selecciona Pregunta', 'required|min_length[1]|trim');

		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array(
					'respuesta' => $this->input->post('respuesta'),
                	'idReactivo' => $this->input->post('idReactivo'));
                $datos['correcto'] = 'Respuesta agregada' ;
                $this->AdminEncuesta_model->insertaRespuesta($data);
                $this->load->view('encuestas/adminEncuesta/altaRespuesta',$data1+$datos);
             }else{                    
             	$datos['error'] = 'ERROR AL AGREGAR' ;
                $this->load->view('encuestas/adminEncuesta/altaRespuesta',$data1+$datos);
             }
	}

	public function actualizaRespuesta(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/actualizaRespuesta',$data);
	}

	public function modificarRespuesta(){
		$data1['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->form_validation->set_rules('respuesta', 'Respuesta', 'required|min_length[1]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array(
					'respuesta' => $this->input->post('respuesta'),
                	'idRespuesta' => $this->input->post('idRespuesta'));
                $datos['correcto'] = 'Respuesta modificada' ;
                $this->AdminEncuesta_model->actualizarRespuesta($data);
                $this->load->view('encuestas/adminEncuesta/actualizaRespuesta',$data1+$datos);
             }else{                    
             	$datos['error'] = 'ERROR AL MODIFICAR' ;
                $this->load->view('encuestas/adminEncuesta/actualizaRespuesta',$data1+$datos);
             }	
	}

	public function eliminarRespuesta(){
		$data['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/eliminarRespuesta',$data);
	}

	public function borrarRespuesta(){
		$data1['estudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->form_validation->set_rules('idRespuesta', 'Respuesta', 'required|min_length[1]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array(
                	'idRespuesta' => $this->input->post('idRespuesta'));
                $datos['correcto'] = 'Respuesta eliminada' ;
                $this->AdminEncuesta_model->eliminarRespuesta($data);
                $this->load->view('encuestas/adminEncuesta/eliminarRespuesta',$data1+$datos);
             }else{                    
             	$datos['error'] = 'ERROR EN LA ELIMINACIÓN' ;
                $this->load->view('encuestas/adminEncuesta/eliminarRespuesta',$data1+$datos);
             }		
	}
//Seleccionar Participantes

	public function seleccionPart(){
		$data1['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$data3['roles'] = $this->AdminEncuesta_model->getRoles();
		$data4['idLogin'] = $this->AdminEncuesta_model->getEncuestadores();
		$this->load->view('encuestas/adminEncuesta/seleccionarParticipante',$data1+$data3+$data4);
	}

	public function recibirDatosseleccionPart(){
		$data1['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$data3['roles'] = $this->AdminEncuesta_model->getRoles();
		$data4['idLogin'] = $this->AdminEncuesta_model->getEncuestadores();

		//$this->form_validation->set_rules('roles', 'Selecciona rol', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idLogin', 'Selecciona Analista', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idEstudio', 'Selecciona Estudio', 'required|min_length[1]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');

		if($this->form_validation->run()!=false){
			$data = array(
				'idLogin' => $this->input->post('idLogin'),
				'idEstudio' => $this->input->post('idEstudio'));
				$datos['correcto'] = 'Asignación correcta';
				$this->AdminEncuesta_model->insertaAsignacion($data);
				$this->load->view('encuestas/adminEncuesta/seleccionarParticipante',$datos+$data1+$data3+$data4);
		}else{
			$datos['error'] = 'ERROR DE SELECCIÓN';
			$this->load->view('encuestas/AdminEncuesta/seleccionarParticipante',$datos+$data1+$data3+$data4);
		}		
	}
//Deselección Participantes
	public function deseleccionPart(){
		$data1['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$data3['idLogin'] = $this->AdminEncuesta_model->getEncuestadores();
		$this->load->view('encuestas/adminEncuesta/deseleccionarParticipante',$data1+$data3);
	}

	public function recibirDatosdeseleccionPart(){
		$data1['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$data3['idLogin'] = $this->AdminEncuesta_model->getEncuestadores();
	

		$this->form_validation->set_rules('idLogin', 'Selecciona Encuestador', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idEstudio', 'Selecciona Estudio', 'required|min_length[1]|trim');

		$this->form_validation->set_message('required','El campo %s es obligatorio');

		if($this->form_validation->run()!=false){
			$data = array(
				'idLogin' => $this->input->post('idLogin'),
				'idUsuario' => $this->input->post('idUsuario'));
				$datos['correcto'] = 'Deselección completada';
				$this->AdminEncuesta_model->eliminarAsignacion($data);
				$this->load->view('encuestas/adminEncuesta/deseleccionarParticipante',$datos+$data1+$data3);
		}else{
			$datos['error'] = 'ERROR EN LA ELIMINACION';
			$this->load->view('encuestas/AdminEncuesta/deseleccionarParticipante',$datos+$data1+$data3);
		}	
	}

}

