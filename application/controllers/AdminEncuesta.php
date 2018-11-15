
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
			$datos["correcto"]="Se Ha Registrado el Estudio Con Éxito";
			$this->AdminEncuesta_model->insertaEstudio($data);
			$this->load->view('encuestas/adminEncuesta/altaEstudio',$datos);
		}else{
			$datos["error"]="Error Al Registrar";
            $this->load->view('encuestas/adminEncuesta/altaEstudio',$datos);

		}	
	}
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
                $datos['correcto'] = 'Se creó el cuestionario';
                $this->AdminEncuesta_model->insertaCuestionario($data);
                $this->load->view('encuestas/adminEncuesta/altaCuestionario',$idEstudio+$datos);
             }else{                    
             	$datos['error'] = 'Escriba un nombre' ;
                $this->load->view('encuestas/adminEncuesta/altaCuestionario',$idEstudio+$datos);
             }
	}

	public function altaReactivo(){
		$data['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$tdata['TipoReactivo'] = $this->AdminEncuesta_model->getTipoReactivo();
		$this->load->view('encuestas/adminEncuesta/altaReactivo',$data+$tdata);
	}
	public function recibirDatosReactivo(){
		$IDcues['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$this->form_validation->set_rules('pregunta', 'Pregunta', 'required|min_length[3]|trim');
		$this->form_validation->set_rules('IDcuestionario', 'Selecciona Estudio', 'required|min_length[1]|trim');

		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array(
					'pregunta' => $this->input->post('pregunta'),
                	'IDcuestionario' => $this->input->post('IDcuestionario'));
                $datos['correcto'] = 'Pregunta agregada con éxito' ;
                $this->AdminEncuesta_model->insertaReactivo($data);
                $this->load->view('encuestas/adminEncuesta/altaReactivo',$IDcues+$datos);
             }else{                    
             	$datos['error'] = 'Debe escribir una pregunta válida' ;
                $this->load->view('encuestas/adminEncuesta/altaReactivo',$IDcues+$datos);
             }
		
	}

	public function altaRespuesta(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->load->view('encuestas/adminEncuesta/altaRespuesta',$data);
	}
	public function recibirDatosRespuesta(){
		$idReactivo['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->form_validation->set_rules('respuesta', 'Respuesta', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idReactivo', 'Selecciona Pregunta', 'required|min_length[1]|trim');

		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array(
					'respuesta' => $this->input->post('respuesta'),
                	'idReactivo' => $this->input->post('idReactivo'));
                $datos['correcto'] = 'Respuesta agregada con éxito' ;
                $this->AdminEncuesta_model->insertaRespuesta($data);
                $this->load->view('encuestas/adminEncuesta/altaRespuesta',$idReactivo+$datos);
             }else{                    
             	$datos['error'] = 'Debe escribir una respuesta válida' ;
                $this->load->view('encuestas/adminEncuesta/altaRespuesta',$idReactivo+$datos);
             }
		
	}


	public function vista_estudios()
	{
		$data['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$this->load->view('encuestas/adminEncuesta/altaCuestionario',$data);
	} 



}