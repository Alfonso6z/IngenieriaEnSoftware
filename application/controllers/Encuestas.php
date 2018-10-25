<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas extends CI_Controller{

		function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('codigofacilito_model');
	}

	public function inicio(){
		$this->load->view('encuestas/inicio');
	}

	public function iniciaSesion(){
		$this->load->view('encuestas/iniciarSesion');
	}
	public function recibirDatos(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'contrasena' => $this->input->post('contrasena')
		);
		$this->codigofacilito_model->creaDept($data);
		$this->load->view('encuestas/inicio');
	}
	public function altadereactivos(){
		$this->load->view('encuestas/administrador/altadereactivos');
	}
	public function guardareactivos(){
		$this->load->view('encuestas/administrador/guardareactivos');

	}
}
?>