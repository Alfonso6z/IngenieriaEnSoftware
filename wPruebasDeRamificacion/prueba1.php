<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofacilito extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('mihelper_helper');
		$this->load->helper('form');
		$this->load->model('codigofacilito_model');
	}

	public function index()
	{	$dato['string'] = 'Hola Culeros desde funcion HolaMundo';
		$this->load->library('menu',array('Inicio','Contacto','Curso','videos'));
		$data['mi_menu']= $this->menu->construirMenu();
		$dato['string'] = ('Hola Culeros de codigo facilito');
		$this->load->view('codigofacilito/bienvenido', $data + $dato);

	}

	public function holaMundo(){

		$dato['string'] = 'Hola Culeros desde funcion HolaMundo';
		$this->load->view('codigofacilito/headers');
		$this->load->view('codigofacilito/bienvenido',$dato);
	}

	public function nuevo(){
		$this->load->view('codigofacilito/headers');
		$this->load->view('codigofacilito/formulario');

	} 

	public function recibirDatos(){
		$dato['string'] = 'Marisol ☻ y Alfonso Gonzalez Zempoalteca';
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'numero' => $this->input->post('numero'),
			//No entendi que tenia que hacer aAlfonso Gonzalez Zempoaltecaqui porque no se ve en el navegador 
			//pero voy a poner esto:
			'numero2' => $this->input->post('numero2')
		);
		$this->codigofacilito_model->creaDept($data);
		$this->load->view('codigofacilito/headers');
		$this->load->view('codigofacilito/bienvenido',$dato);
		$dato['string'] = 'Marisol ☻ y Alfonso';
		$dato['string'] = 'Marisol ☻ y Gonzalez ';
		$dato['string'] = 'Marisol ☻ y Zempoalteca';
	}
}
?>
