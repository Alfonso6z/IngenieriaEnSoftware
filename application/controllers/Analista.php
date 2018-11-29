<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analista extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Analista_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->view('encuestas/analista/headerAnalista');
		if (!$this->session->userdata("login")){
			redirect(site_url('login',NULL));
		}
		else if($this->session->userdata('rol')!='Analista'){
			redirect(site_url('login/logout',NULL));
		}
	}

 	public function index(){
		$this->load->view('encuestas/analista/inicioAnalista');

	}
    public function estudiosParticularAnalista(){
    	$this->session->userdata('idLogin')!=('idLogin');
		$data['idCuestionario'] = $this->Analista_model->getCuestionario();
		$data['idEstudio'] = $this->Analista_model->getEncuesta();
		$this->load->view('encuestas/analista/estudiosEnParticular',$data);
	}
}