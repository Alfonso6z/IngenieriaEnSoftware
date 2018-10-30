<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas extends CI_Controller{

		function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('encuestas_model');
	}

	public function inicio(){
		$this->load->view('encuestas/inicio');
	}

	public function iniciaSesion(){
		$this->load->view('encuestas/iniciarSesion');
	}
	public function login(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'contrasena' => $this->input->post('contrasena')
		);
		if($this->encuestas_model->login($data)){
			$this->load->view('encuestas/inicio');
		}else{
			$this->load->view('encuestas/iniciarSesion');
		}
		
	}

	public function registrarse(){
		$this->load->view('encuestas/registro');
	}
	public function altadereactivos(){
		$this->load->view('encuestas/administrador/altadereactivos');
	}
	public function guardareactivos(){
		$data = array(
			'pregunta' => $this->input->post('pregunta'),
		);
		$this->encuestas_model->insertaPregunta($data);
		$this->load->view('encuestas/inicio');
	}
	public function recibirDatosRegistro(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'email' => $this->input->post('email'),
			'contrasena' => $this->input->post('contrasena')
		);
		$this->encuestas_model->insertarRegistro($data);
		$this->load->view('encuestas/inicio');
	}

	public function vista_alta()
	{
	   $this->load->view('encuestas/administrador/altaEstudio');
	}

	public function vista_estudios()
	{
		//$data['recuperar']= $this->estudios_model->obtenerDatos();
		$this->load->view('encuestador/vistaEstudio');
 }  
}
?>