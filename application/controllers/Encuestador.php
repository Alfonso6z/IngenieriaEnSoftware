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
				$idLogin['idLogin'] = $this->session->userdata('idLogin');
            	$dataID = array('idCuestionario' => $this->input->post('idCuestionario'));
            	$data['cuestionario'] =$this->Encuestas_model->dameNombre($dataID);
            	$asignacion = $this->Encuestas_model->getEncuestaLogin2($idLogin,$data['cuestionario']);
				$asig1 = array_pop($asignacion); 
            	$dataC = $this->Encuestas_model->getPreguntasContestadas($asig1);
            	$data1 = $this->Encuestas_model->getReactivosCuestionario($dataID,$dataC);
            	
            	if($data1){
            		$reactivo['reactivo'] = array_pop($data1);
            		$this->load->view('encuestas/encuestador/responderReactivo',$data+$reactivo+$respuestas);
            	}else{
            		$this->Encuestas_model->eliminaAsignacion($asig1);
            		$reactivo['reactivo']=null;
            		$this->load->view('encuestas/encuestador/responderReactivo',$data+$reactivo+$respuestas);
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
		$idLogin['idLogin'] = $this->session->userdata('idLogin');
		$dataID = array('idCuestionario' => $this->input->post('idCuestionario'));
		$data['cuestionario'] =$this->Encuestas_model->dameNombre($dataID);
		$asignacion = $this->Encuestas_model->getEncuestaLogin2($idLogin,$data['cuestionario']);
		$asig1 = array_pop($asignacion); 
		$respuesta = array('respuesta'=>$this->input->post('idRespuesta'));
		$idReactivo = array('idReactivo'=>$this->input->post('reactivo'));
		$respuestaAbierta = array('respuesta'=>$this->input->post('respuesta'));
		if(!empty($respuesta['respuesta'])){
			$this->Encuestas_model->insertarRespuesta($respuesta,$idReactivo,$asig1);
		}else{
			$this->Encuestas_model->insertarRespuesta($respuestaAbierta,$idReactivo,$asig1);
		}
		$respuestas['respuestas'] = $this->Encuestas_model->getRespuestas();
        $dataC = $this->Encuestas_model->getPreguntasContestadas($asig1);
        $data1 = $this->Encuestas_model->getReactivosCuestionario($dataID,$dataC);
        
    	if($data1){
    		$reactivo['reactivo'] = array_pop($data1);
    		$this->load->view('encuestas/encuestador/responderReactivo',$data+$reactivo+$respuestas);
    	}else{
    		$this->Encuestas_model->eliminaAsignacion($asig1);
    		$reactivo['reactivo']=null;
            $this->load->view('encuestas/encuestador/responderReactivo',$data+$reactivo+$respuestas);
    	}
		

	}

}