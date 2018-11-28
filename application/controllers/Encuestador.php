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

	public function estudiosParticular(){
		$data['idEstudio'] = $this->Encuestas_model->getEncuesta();
		$this->load->view('encuestas/encuestador/estudiosParticular',$data);
	}

	public function estudiosAsignadosE(){
		$data['idEstudio'] = $this->Encuestas_model->getEncuesta();
		$this->load->view('encuestas/encuestador/estudiosAsignados',$data);
	}

	public function responderReactivo(){
		$idLogin['idLogin'] = $this->session->userdata('idLogin');
		$data['idEstudio'] = $this->Encuestas_model->getEncuestaLogin($idLogin);
		$data1['estudios'] = $this->Encuestas_model->getEstudioId($data);
 		$this->load->view('encuestas/encuestador/responderReactivo',$idLogin+$data);
	}

	public function recibirRespuesta(){
		$data1['estudio'] = $this->Encuestas_model->getEncuesta();
		$this->form_validation->set_rules('respuesta', 'Respuesta', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idReactivo', 'Selecciona Pregunta', 'required|min_length[1]|trim');

		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array(
					'respuesta' => $this->input->post('respuesta'),
                	'idReactivo' => $this->input->post('idReactivo'));
                $datos['correcto'] = '' ;
                $this->Encuestas_model->insertaRespuesta($data);
                $this->load->view('encuestas/adminEncuesta/altaRespuesta',$data1+$datos);
             }else{                    
             	$datos['error'] = 'Debe escribir una respuesta válida' ;
                $this->load->view('encuestas/adminEncuesta/altaRespuesta',$data1+$datos);
             }
		
	}

}