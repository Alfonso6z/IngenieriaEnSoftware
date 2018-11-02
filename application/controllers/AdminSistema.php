<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSistema extends CI_Controller{

		function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminSistema_model');
		$this->load->library('session');
		if (!$this->session->userdata("login")){
			redirect(site_url('login',NULL));
		}
		else if($this->session->userdata('rol')!='AdminSistema'){
			redirect(site_url('login/logout',NULL));
		}
	}

 	public function index(){
		$this->load->view('encuestas/adminSistema/inicioAdminSistema');
	}
	public function altaUsuarios(){
		$this->load->view('encuestas/adminSistema/altaUsuario');
	}
	public function recibirDatosUsuario(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'email' => $this->input->post('email'),
			'contrasena' => $this->input->post('contrasena')
		);
		$this->adminSistema_model->insertarRegistro($data);
		$this->load->view('encuestas/adminSistema/inicioAdminSistema');
	}
}