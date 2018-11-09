<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSistema extends CI_Controller{

		function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
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
		$data['roles'] = $this->adminSistema_model->getRoles();
		$this->load->view('encuestas/adminSistema/altaUsuario',$data);
	}
	public function recibirDatosUsuario(){
		$roles['roles'] = $this->adminSistema_model->getRoles();
		if($this->input->post('Registrarse')){

			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|alpha|trim');
		    $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[3]|alpha|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email|is_unique[login.email]|trim');
			$this->form_validation->set_rules('contrasena', 'Contraseña', 'required|min_length[3]|trim');
			$this->form_validation->set_rules('tipoUsuario', 'Tipo Usuario', 'required|trim');
			

			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras sin tildes');
			$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
			$this->form_validation->set_message('min_length[3]','El campo %s debe tener al menos 3 caracteres');
			$this->form_validation->set_message('required','El campo %s es obligatorio');
			$this->form_validation->set_message('is_unique','El %s ya esta registrado');

			if($this->form_validation->run()!=false){ 
            	$datos["correcto"]="Se Ha Registrado Con Éxito";
            	$data = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'email' => $this->input->post('email'),
				'contrasena' => $this->input->post('contrasena'),
				'tipoUsuario' => $this->input->post('tipoUsuario')
				);
				$this->adminSistema_model->insertarRegistro($data);
				$this->load->view('encuestas/adminSistema/altaUsuario',$roles+$datos);
        	}else{
            	$datos["error"]="Error Al Registrar";
            	$this->load->view('encuestas/adminSistema/altaUsuario',$roles+$datos);
       		}      
        	
		}
		
		
	}

	public function altaTipoUsuario(){
		$this->load->view('encuestas/adminSistema/altaTipoUsuario');
	}
	
	public function recibirDatosTipoUsuario(){
		$this->form_validation->set_rules('nombre', 'Tipo de Usuario', 'required|is_unique[roles.idRol]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Se Ha Registrado Con Éxito";
			$data = array('nombre' => $this->input->post('nombre'));
			$this->adminSistema_model->insertarTipoUsuario($data);
			$this->load->view('encuestas/adminSistema/altaTipoUsuario',$datos);
		}else{
			$datos["error"]="Error Al Registrar";
            	$this->load->view('encuestas/adminSistema/altaTipoUsuario',$datos);
		}
	}

	public function altaTipoReactivo(){
		$this->load->view('encuestas/adminSistema/altaTipoReactivo');
	}

	public function recibirDatosTipoReactivo(){
		$this->form_validation->set_rules('nombre', 'Tipo de Reactivo', 'required|is_unique[tiporeactivo.nombre]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El reactivo %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Agregado con éxito";
			$data = array('nombre' => $this->input->post('nombre'));
			$this->adminSistema_model->insertarTipoReactivo($data);
			$this->load->view('encuestas/adminSistema/altaTipoReactivo',$datos);
		}else{
			$datos["error"]="Error de reactivo";
            	$this->load->view('encuestas/adminSistema/altaTipoReactivo',$datos);
		}
	}

}