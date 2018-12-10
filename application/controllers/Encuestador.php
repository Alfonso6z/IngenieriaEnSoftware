<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestador extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Encuestas_model');
		$this->load->view('encuestas/encuestador/headerEncuestador');
		if (!$this->session->userdata("login")){
			redirect(site_url('login',NULL));
		}
		else if($this->session->userdata('rol')!='Encuestador'){
			redirect(site_url('login/logout',NULL));
		}
	}
	public function index(){
		$this->load->view('encuestas/encuestador/inicioEncuestador');
	}

	public function estudiosAsignadosE(){
		$idLogin['idLogin'] = $this->session->userdata('idLogin');
		$data1['idEstudio'] = $this->Encuestas_model->getEncuestaLogin($idLogin);
		$data['estudios'] = $this->Encuestas_model->getEstudioId($data1);
		$this->load->view('encuestas/encuestador/estudiosAsignados',$data);
	}
	public function recibirDatosEstudiosAsignados(){
		if($this->input->post('Seleccionar')){
			$this->form_validation->set_rules('idEstudio', 'Estudio', 'required');
			$this->form_validation->set_message('required','Seleccione un  %s');
			if($this->form_validation->run()!=false){ 
            	$data = array('idEstudio' => $this->input->post('idEstudio'));
            	$data1['cuestionarios'] = $this->Encuestas_model->getCuestionarios($data);
            	$data2 = array('nombreEstudio' => $this->Encuestas_model->getEstudioNombre($data));
				$this->load->view('encuestas/encuestador/estudiosParticular',$data1+$data2);
        	}else{
        		$idLogin['idLogin'] = $this->session->userdata('idLogin');
				$data1['idEstudio'] = $this->Encuestas_model->getEncuestaLogin($idLogin);
				$data2['estudios'] = $this->Encuestas_model->getEstudioId($data1);
            	$datos["error"]="Error";
            	$this->load->view('encuestas/encuestador/estudiosAsignados',$datos+$data2);
       		}      
        	
		}	
	}

	public function contestarCuestionario(){
		if($this->input->post('Contestar')){
			$respuestas['respuestas'] = $this->Encuestas_model->getRespuestas();
			$this->form_validation->set_rules('idCuestionario', 'Cuestionario', 'required');
			$this->form_validation->set_message('required','Seleccione un  %s');
			if($this->form_validation->run()!=false){ 
            	$data = array('idCuestionario' => $this->input->post('idCuestionario'));
            	$data1 = $this->Encuestas_model->getReactivosCuestionario($data);
            	$max = sizeof($data1);
            	for ($i=0; $i < $max; $i++) { 
            		$data4['reactivo'] = $data1[$i];
            		$this->load->view('encuestas/encuestador/responderReactivo',$data4+$respuestas);
            	}
         
				
        	}else{
        		$idLogin['idLogin'] = $this->session->userdata('idLogin');
				$data1['idEstudio'] = $this->Encuestas_model->getEncuestaLogin($idLogin);
				$data2['estudios'] = $this->Encuestas_model->getEstudioId($data1);
            	$datos["error"]="Error";
            	$this->load->view('encuestas/encuestador/estudiosAsignados',$datos+$data2);
       		}      
        	
		}		
	}

	public function recibirRespuesta(){
		$data = $this->input->post('respuesta');
		print_r($data);
		
	}

}