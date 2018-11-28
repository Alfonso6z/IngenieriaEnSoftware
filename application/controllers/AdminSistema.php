<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSistema extends CI_Controller{

		function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminSistema_model');
		$this->load->library('session');
		$this->load->view('encuestas/adminSistema/headerAdminSistema');
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
            	$data = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'email' => $this->input->post('email'),
				'contrasena' => $this->input->post('contrasena'),
				'tipoUsuario' => $this->input->post('tipoUsuario')
				);
				$datos["correcto"]="Se Ha Registrado Con Éxito  " . $data['email'];
				$this->adminSistema_model->insertarRegistro($data);
				$this->email->from('agzdn666@outlook.es', 'Wolfgang');
				$this->email->to($data['email']);
				$this->email->subject('Sistema de Encuestas Wolfgang');
				$this->email->message('<h2>' . $data['nombre'] . 'Tu Registro fue Exitoso </h2><hr><br><br>Tu password es:' . $data['contrasena']);
				$this->email->send();
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

		$this->form_validation->set_rules('nombre', 'Tipo de Usuario', 'required|is_unique[roles.idRol]|trim|alpha');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		$this->form_validation->set_message('alpha','El campo %s solo acepta letras');
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

	public function actualizaTipoUsuario(){
		$data['roles'] = $this->adminSistema_model->getRoles();
		$this->load->view('encuestas/adminSistema/actualizaTipoUsuario',$data);
	}
	public function modificarTipoUsuario(){
		$data['roles'] = $this->adminSistema_model->getRoles();
		$this->form_validation->set_rules('nombre', 'Tipo de Usuario', 'required|is_unique[roles.idRol]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Se Ha Actualizado Con Éxito";
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'tipoUsuario'=> $this->input->post('tipoUsuario'));
			$this->adminSistema_model->actualizaTipoDeUsuario($data);
			$this->load->view('encuestas/adminSistema/actualizaTipoUsuario',$data+$datos);
		}else{
			$datos["error"]="Error Al Actualizar";
            	$this->load->view('encuestas/adminSistema/actualizaTipoUsuario',$data+$datos);
		}
	}
	public function bajaTipoDeUsuario(){
		$data['roles'] = $this->adminSistema_model->getRoles();
		$this->load->view('encuestas/adminSistema/bajaTipoDeUsuario',$data);
	}
	public function eliminarTipoDeUsuario(){
		$data = array(
				'idRol'=> $this->input->post('tipoUsuario'));
		$datos["error"]="Se ha Eliminado ". $data['idRol'];
		$this->adminSistema_model->eliminaTipoDeUsuario($data);
		$data['roles'] = $this->adminSistema_model->getRoles();
		$this->load->view('encuestas/adminSistema/bajaTipoDeUsuario',$data+$datos);
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
	public function actualizaTipoReactivo(){
		$data['tiporeactivo'] = $this->adminSistema_model->getTreactivos();
		$this->load->view('encuestas/adminSistema/actualizaTipoReactivo',$data);
	}
	public function modificarTipoReactivo(){
		$data1['tiporeactivo'] = $this->adminSistema_model->getTreactivos();
		$this->form_validation->set_rules('nombre', 'Nuevo Tipo De Reactivo', 'required|is_unique[tiporeactivo.nombre]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
        if($this->form_validation->run()!=false){
			$datos["correcto"]="Se Ha Actualizado Con Éxito";
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'tipoReactivo'=> $this->input->post('tipoReactivo'));
			$this->adminSistema_model->actualizaTipoDeReactivo($data);
			$data1['tiporeactivo'] = $this->adminSistema_model->getTreactivos();
			$this->load->view('encuestas/adminSistema/actualizaTipoReactivo',$data1+$datos);
		}else{
			$datos["error"]="Error Al Actualizar";
            	$this->load->view('encuestas/adminSistema/actualizaTipoReactivo',$data1+$datos);
		}
	}
	public function bajaTipoDeReactivo(){
		$data['tiporeactivo'] = $this->adminSistema_model->getTreactivos();
		$this->load->view('encuestas/adminSistema/bajaTipoDeReactivo',$data);
	}
	public function eliminarTipoDeReactivo(){
		$data = array(
				'nombre'=> $this->input->post('tipoReactivo'));
		$datos["error"]="Se ha Eliminado ". $data['nombre'];
		$this->adminSistema_model->eliminaTipoDeReactivo($data);
		$data['tiporeactivo'] = $this->adminSistema_model->getTreactivos();
		$this->load->view('encuestas/adminSistema/bajaTipoDeReactivo',$data+$datos);
	}

	public function actualizaUsuario(){
		$data['idLogin'] = $this->adminSistema_model->getUsuario();
		$rdata['roles'] = $this->adminSistema_model->getRoles();
		$this->load->view('encuestas/adminSistema/actualizaUsuario',$data+$rdata);
	}
	public function modificarUsuario(){
		$data['idLogin'] = $this->adminSistema_model->getUsuario();
		$rdata['roles'] = $this->adminSistema_model->getRoles();

		if($this->input->post('Actualizar')){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|alpha|trim');
		    $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[3]|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email|trim');
			$this->form_validation->set_rules('tipoUsuario', 'Tipo Usuario', 'required|trim');
			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras sin tildes');
			$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
			$this->form_validation->set_message('required','El campo %s es obligatorio');
			if($this->form_validation->run()!=false){ 
            	$data = array(
            	'idLogin'=> $this->input->post('idLogin'),	
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'email' => $this->input->post('email'),
				'tipoUsuario' => $this->input->post('tipoUsuario')
				);
				$datos["correcto"]="Ha modificado el usuario con éxito";
				$this->adminSistema_model->actualizaUsuario($data);
				$this->load->view('encuestas/adminSistema/actualizaUsuario',$data+$rdata+$datos);
			}else{
			$datos["error"]="Error en la modificación";
            	$this->load->view('encuestas/adminSistema/actualizaUsuario',$data+$datos+$rdata);
			}
		}
	}

}