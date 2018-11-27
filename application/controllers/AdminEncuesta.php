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
		$tdata['TipoReactivo'] = $this->AdminEncuesta_model->getTipoReactivo();
		$this->form_validation->set_rules('pregunta', 'Pregunta', 'required|min_length[3]|trim');
		$this->form_validation->set_rules('IDcuestionario', 'Selecciona Estudio', 'required|min_length[1]|trim');

		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){ //Si la validación es correcta
                $data = array(
					'pregunta' => $this->input->post('pregunta'),
                	'IDcuestionario' => $this->input->post('IDcuestionario'),'TipoReactivo' => $this->input->post('TipoReactivo'));
                $datos['correcto'] = 'Pregunta agregada con éxito' ;
                $this->AdminEncuesta_model->insertaReactivo($data);
                $this->load->view('encuestas/adminEncuesta/altaReactivo',$IDcues+$datos+$tdata);
             }else{                    
             	$datos['error'] = 'Debe escribir una pregunta válida' ;
                $this->load->view('encuestas/adminEncuesta/altaReactivo',$IDcues+$datos+$tdata);
             }
		
	}

	public function altaRespuesta(){
		$data['reactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->load->view('encuestas/adminEncuesta/altaRespuesta',$data);
	}

	public function respuestas() {
        $idReactivo = $this->input->post('idReactivo');
        if($idReactivo){
            $this->load->model('AdminEncuestas_model');
            $respuestas = $this->AdminEncuestas_model->getRespuestas($idReactivo);
            echo '<option value="0">Respuestas</option>';
            foreach($respuestas as $fila){
                echo '<option value="'. $fila->idRespuesta .'">'. $fila->resnombre .'</option>';
            }
        }  else {
            echo '<option value="0">Respuestas</option>';
        }
    }
	public function recibirDatosRespuesta(){
		$idReactivo['reactivo'] = $this->AdminEncuesta_model->getReactivo();
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

	public function seleccionPart(){
		$data1['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$data2['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionarioAsignados();
		$data3['idLogin'] = $this->AdminEncuesta_model->getEncuestadores();
		$this->load->view('encuestas/adminEncuesta/seleccionarParticipante',$data1+$data2+$data3);
	}

	public function recibirDatosseleccionPart(){
		$data1['idEstudio'] = $this->AdminEncuesta_model->getEncuesta();
		$data2['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionarioAsignados();
		$data3['idLogin'] = $this->AdminEncuesta_model->getEncuestadores();

		$this->form_validation->set_rules('idEstudio', 'Selecciona Estudio', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('IDcuestionario', 'Selecciona Cuestionario', 'required|min_length[1]|trim');
		$this->form_validation->set_rules('idLogin', 'Selecciona Usuario', 'required|min_length[1]|trim');

		$this->form_validation->set_message('required','El campo %s es obligatorio');

		if($this->form_validation->run()!=false){
			$data = array(
				'idLogin' => $this->input->post('idLogin'),
				'IDcuestionario' => $this->input->post('IDcuestionario'));
				$datos['correcto'] = 'Relacion agregada con éxito';
				$this->AdminEncuesta_model->insertaAsignacion($data);
				$this->load->view('encuestas/AdminEncuesta/seleccionarParticipante',$datos+$data1+$data2+$data3);
		}else{
			$datos['error'] = 'Error al seleccionar datos';
			$this->load->view('encuestas/AdminEncuesta/seleccionarParticipante',$datos+$data1+$data2+$data3);
		}
		
	}

	public function actualizaReactivo(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->load->view('encuestas/AdminEncuesta/actualizaReactivo',$data);
	}
	public function modificarReactivo(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->form_validation->set_rules('pregunta', 'Pregunta', 'required|is_unique[reactivos.pregunta]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Se Ha Actualizado Con Éxito";
			$data1 = array(
				'pregunta' => $this->input->post('pregunta'),
				'idReactivo'=> $this->input->post('idReactivo'));
			$this->AdminEncuesta_model->actualizaReactivo($data1);
			$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
			$this->load->view('encuestas/adminEncuesta/actualizaReactivo',$datos+$data);
		}else{
			$datos["error"]="Error Al Actualizar";
            	$this->load->view('encuestas/adminEncuesta/actualizaReactivo',$datos+$data);
		}
	}

	public function eliminarReactivo(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->load->view('encuestas/AdminEncuesta/eliminarReactivo',$data);
	}
	public function borrarReactivo(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->form_validation->set_rules('idReactivo', 'Selecciona pregunta', 'required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){
			$data1 = array(
				'pregunta' => $this->input->post('pregunta'),
				'idReactivo'=> $this->input->post('idReactivo'));
			$this->AdminEncuesta_model->eliminaReactivo($data1);
			$datos["correcto"]="Se Ha Eliminado Con Éxito     ".$data1['pregunta'];
			$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
			$this->load->view('encuestas/adminEncuesta/eliminarReactivo',$datos+$data);
		}else{
			$datos["error"]="Error Al Eliminar";
            	$this->load->view('encuestas/adminEncuesta/eliminarReactivo',$datos+$data);
		}
	}

	public function actualizaCuestionario(){
		$data['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$this->load->view('encuestas/AdminEncuesta/actualizaCuestionario',$data);
	}
	public function modificarCuestionario(){
		$data['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|is_unique[cuestionarios.nombre]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Se Ha Actualizado Con Éxito";
			$data1 = array(
				'nombre' => $this->input->post('nombre'),
				'IDcuestionario'=> $this->input->post('IDcuestionario'));
			$this->AdminEncuesta_model->actualizaCuestionario($data1);
			$data['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
			$this->load->view('encuestas/adminEncuesta/actualizaCuestionario',$datos+$data);
		}else{
			$datos["error"]="Error Al Actualizar";
            	$this->load->view('encuestas/adminEncuesta/actualizaCuestionario',$datos+$data);
		}
	}
	public function eliminarCuestionario(){
		$data['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$this->load->view('encuestas/AdminEncuesta/eliminarCuestionario',$data);
	}
	public function borrarCuestionario(){
		$data['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
		$this->form_validation->set_rules('IDcuestionario', 'Selecciona Cuestionario', 'required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){
			$data1 = array(
				'nombre' => $this->input->post('nombre'),
				'IDcuestionario'=> $this->input->post('IDcuestionario'));
			$this->AdminEncuesta_model->eliminarCuestionario($data1);
			$datos["correcto"]="Se Ha Eliminado Con Éxito     ".$data1['nombre'];
			$data['IDcuestionario'] = $this->AdminEncuesta_model->getCuestionario();
			$this->load->view('encuestas/adminEncuesta/eliminarCuestionario',$datos+$data);
		}else{
			$datos["error"]="Error Al Eliminar";
            	$this->load->view('encuestas/adminEncuesta/eliminarCuestionario',$datos+$data);
		}
	}

	public function actualizaEstudio(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->load->view('encuestas/AdminEncuesta/actualizaReactivo',$data);
	}
	public function modificarEstudio(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->form_validation->set_rules('pregunta', 'Pregunta', 'required|is_unique[reactivos.pregunta]|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique','El %s ya esta registrado');
		if($this->form_validation->run()!=false){
			$datos["correcto"]="Se Ha Actualizado Con Éxito";
			$data1 = array(
				'pregunta' => $this->input->post('pregunta'),
				'idReactivo'=> $this->input->post('idReactivo'));
			$this->AdminEncuesta_model->actualizaReactivo($data1);
			$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
			$this->load->view('encuestas/adminEncuesta/actualizaReactivo',$datos+$data);
		}else{
			$datos["error"]="Error Al Actualizar";
            	$this->load->view('encuestas/adminEncuesta/actualizaReactivo',$datos+$data);
		}
	}

	public function eliminarEstudio(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->load->view('encuestas/AdminEncuesta/eliminarReactivo',$data);
	}
	public function borrarEstudio(){
		$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
		$this->form_validation->set_rules('idReactivo', 'Selecciona pregunta', 'required|trim');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if($this->form_validation->run()!=false){
			$data1 = array(
				'pregunta' => $this->input->post('pregunta'),
				'idReactivo'=> $this->input->post('idReactivo'));
			$this->AdminEncuesta_model->eliminaReactivo($data1);
			$datos["correcto"]="Se Ha Eliminado Con Éxito     ".$data1['pregunta'];
			$data['idReactivo'] = $this->AdminEncuesta_model->getReactivo();
			$this->load->view('encuestas/adminEncuesta/eliminarReactivo',$datos+$data);
		}else{
			$datos["error"]="Error Al Eliminar";
            	$this->load->view('encuestas/adminEncuesta/eliminarReactivo',$datos+$data);
		}
	}


}

