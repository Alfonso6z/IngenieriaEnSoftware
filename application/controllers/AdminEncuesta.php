<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEncuesta extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('AdminEncuesta_model');
		$this->load->library('session');
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
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion')
		);
		$this->AdminEncuesta_model->insertaEstudio($data);
		$this->load->view('encuestas/adminEncuesta/inicioAdminEncuesta');
	}
	public function altaReactivo(){
		$this->load->view('encuestas/adminEncuesta/altaReactivo');
	}
	public function recibirDatosReactivo(){
		$data = array(
			'pregunta' => $this->input->post('pregunta'));
		$this->AdminEncuesta_model->insertaReactivo($data);
		$this->load->view('encuestas/adminEncuesta/inicioAdminEncuesta');
	}
	public function vista_estudios()
	{
		$data["recuperar"]= $this->AdminEncuesta_model->obtenerDatos();
		$this->load->view('encuestas/encuestador/vistaEstudio',$data);
 	}  
}