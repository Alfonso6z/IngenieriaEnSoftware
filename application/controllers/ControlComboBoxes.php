<?php
class ControlComboBoxes extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('AdminEncuesta_model');
        $this->load->model('AdminSistema_model');
        $this->load->model('Encuestas_model');
    }
    public function estudioCuestionario() {
        $data =array( 'idEstudio' => $this->input->post('idEstudio'));
        if($data){
            $cuestionarios = $this->AdminEncuesta_model->getCuestionarioEstudio($data);
            echo '<option value="0"> Cuestionario </option>';
            foreach($cuestionarios as $i){
                echo '<option value="'. $i->idCuestionario .'">'. $i->cuenombre .'</option>';
            }
        }  else {
            echo '<option value="0">Error</option>';
        }
    }

    public function cuestionarioReactivo() {
        $data =array( 'idCuestionario' => $this->input->post('idCuestionario'));
        if($data){
            $reactivos = $this->AdminEncuesta_model->getReactivoCuestionario($data);
            echo '<option value="0">Pregunta</option>';
            foreach($reactivos as $fila){
                if($fila->idTipoReactivo=="2"){
                     echo '<option value="'. $fila->idReactivo.'">'. $fila->pregunta .'</option>';
                    }
                }
        }else{
             echo '<option value="0">Preguntas</option>';
        }
    }

    public function rolUsuario() {
        $data =array( 'rol' => $this->input->post('idRol'));
        if($data){
            $usuario = $this->AdminEncuesta_model->getRolUsuario($data);
            echo '<option value="0">Selecciona Usuario</option>';
            foreach($usuario as $fila){
              echo '<option value="'. $fila->idLogin.'">'. $fila->user .'</option>';
            }
        }  else {
             echo '<option value="0">Preguntas</option>';
        }
    }

    public function cuestionarioEncuestador() {
        $data =array( 'idCuestionario' => $this->input->post('idCuestionario'));
        if($data){
            $participantes = $this->AdminEncuesta_model->getEncuestadoroCuestionario($data);
            echo '<option value="0">Preguntas</option>';
            foreach($participantes as $fila){
              echo '<option value="'. $fila->idLogin.'">'. $fila->user .'</option>';
            }
        }  else {
             echo '<option value="0">Preguntas</option>';
        }
    }

    public function reactivoRespuesta() {
        $data =array( 'idReactivo' => $this->input->post('idReactivo'));
        if($data){
            $respuestas = $this->AdminEncuesta_model->getRespuestas($data);
            if($respuestas){
                 foreach ($respuestas as $i) {
                    echo "<tr><td>".$i->respuesta."</td></tr>";
                }   
            }else{
             echo "<tr><td>Sin Respuestas</td></tr>";
            }
        }    
    }

    public function modificaReactivoRespuesta() {
        $data =array( 'idReactivo' => $this->input->post('idReactivo'));
        if($data){
            $respuestas = $this->AdminEncuesta_model->getRespuestas($data);
            foreach ($respuestas as $i) {
                echo '<option value="'. $i->idRespuesta .'">'. $i->respuesta .'</option>';
            }   
        }
    }

    public function Usuario() {
        $data =array( 'idLogin' => $this->input->post('idLogin'));
        if($data){
         $usuario = $this->AdminEncuesta_model->getUsuario($data);
            echo '<option value="0">Nombre</option>';
            foreach($usuario as $i){
                echo '<value="'. $i->idLogin .'">'. $i->user .'</option>';
            }
        }  else {
            echo '<value="0">Usuario</option>';
        }
    }   

    public function estudioCuestionarioRespuestas() {
        $data =array( 'idEstudio' => $this->input->post('idEstudio'));
        if($data){
            $cuestionariosSelect = $this->Encuestas_model->cuestionariosSelect($data);
            $cuestionarios = $this->Encuestas_model->cuestionarioNombre($cuestionariosSelect);
            echo '<option value="0">Cuestionarios</option>';
            foreach($cuestionarios as $i){
                echo '<option value="'. $i->idCuestionario .'">'. $i->cuenombre .'</option>';
            }
        }  else {
            echo '<option value="0">Cuestionarios</option>';
        }
    }

    public function estudioCuestionarioParticular(){
        $data =array( 'idEstudio' => $this->input->post('idEstudio'));
        if($data){
            $cuestionariosSelect = $this->Encuestas_model->cuestionariosSelect($data);
            $cuestionarios = $this->Encuestas_model->cuestionarioNombre($cuestionariosSelect);
            foreach($cuestionarios as $i){
                echo  "<tr><td>".$i->cuenombre."</td></tr>";
            }
        }  else {
            echo "<tr><td>Sin Cuestionario </td></tr>";;
        }
    }

    public function estudioParticipantes(){
        $data =array( 'idEstudio' => $this->input->post('idEstudio'));
        if($data){
            $estudioSelect = $this->AdminEncuesta_model->estudioSelect($data);
            $estudio = $this->AdminEncuesta_model->estudioNombre($estudioSelect);
            echo '<option value="0">Participantes</option>';
            foreach($estudio as $i){
                echo '<option value="'. $i->idLogin .'">'. $i->user .' ('.$i->rol.')'.'</option>';
               //echo  "<tr><td>".$i->user."</td></tr>";
            }
        }  else {
            echo "<tr><td>Sin Participantes </td></tr>";;
        }
    }

    
}