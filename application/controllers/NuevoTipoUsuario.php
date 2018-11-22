<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NuevoTipoUsuario extends CI_Controller{

		function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if (!$this->session->userdata("login")){
			redirect(site_url('login',NULL));
		}
		$this->load->view('encuestas/ntu/headerNuevoTipoUsuario');
	}

 	public function index(){
		$this->load->view('encuestas/ntu/inicioNuevoTipoUsuario');
	}

}