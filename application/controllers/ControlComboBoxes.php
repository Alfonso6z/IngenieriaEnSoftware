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
            echo '<option value="0"> Respuestas </option>';
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
    public function llenarUsuario(){
        $data = array('idLogin' => $this->input->post('idLogin'));
        if($data){
            $respuestas = $this->AdminSistema_model->getUsuarioId($data);
            if($respuestas){
                 foreach ($respuestas as $i) {
                    $nombre=array('name' => 'nombre','placeholder' => 'Nombre','maxlength'=>'20','value' => $i->user);
                    $apellido=array('name' => 'apellido','placeholder' => ' Apellido','maxlength'=>'20','value' => $i->apellido);
                    $email=array('name' => 'email','placeholder' => ' Em@il','maxlength'=>'25','value' => $i->email);
                    echo " <h4 class = 'text-center'>".form_label('Usuario:','nombre')."".form_input($nombre)."</h4><h4 class='text-center'>".form_label('Apellido: ','apellido').form_input($apellido)."</h4><h4 class = 'text-center'>".form_label('Em@il: ','email').form_input($email),"</h4>";
                }   
            }else{
             echo "<tr><td>Sin Respuestas</td></tr>";
            }
        }    
    }
    public function llenarTipoUsuario(){
        $data = array('idRol' => $this->input->post('tipoUsuario'));
        if($data){
            $roles = $this->AdminSistema_model->getRolesId($data);
            if($roles){
                 foreach ($roles as $i) {
                    $nombre=array('name' => 'nombre','placeholder' => 'Tipo de rol','maxlength'=>'20','value'=>$i->idRol);
                    echo " <h4 class = 'text-center'>".form_label('Nuevo Tipo De Usuario :','nombre')."<br>".form_input($nombre)."</h4>";
                }   
            }else{
             echo "<tr><td>Sin Rol </td></tr>";
            }
        }    
    }

    public function llenarTipoReactivo(){
        $data = array('idTipoReactivo' => $this->input->post('tipoReactivo'));
        if($data){
            $reactivos = $this->AdminSistema_model->getReactivoId($data);
            if($reactivos){
                 foreach ($reactivos as $i) {
                    $nombre=array('name' => 'nombre','placeholder' => 'Tipo de rol','maxlength'=>'20','value'=>$i->nombre);
                    echo " <h4 class = 'text-center'>".form_label('Nuevo Tipo De Reactivo :','nombre')."<br>".form_input($nombre)."</h4>";
                }   
            }else{
             echo "<tr><td>Sin Reactivo </td></tr>";
            }
        }
    }
    public function llenarEstudio(){
        $data = array('idEstudio' => $this->input->post('idEstudio'));
        if($data){
            $estudio = $this->AdminEncuesta_model->getEstudioId($data);
            if($estudio){
                 foreach ($estudio as $i) {
                    $nombre=array('name' => 'nombre','placeholder' => 'Escribe el nuevo nombre','maxlength'=>'50','value'=>$i->nombre);
                    $descripcion=array('name' => 'nombre','placeholder' => 'Escribe el nuevo nombre','maxlength'=>'100','value'=>$i->descripcion);
                    echo " <h4 class = 'text-center'>".form_label('Nombre:','nombre')."".form_input($nombre)."</h4><h4 class='text-center'>".form_label('Descripcion: ','descripcion'),"<br>".form_textarea($descripcion)."</h4>";
                }   
            }else{
             echo "<tr><td>Sin Estudio</td></tr>";
            }
        }    
    }

    public function llenarCuestionario(){
        $data = array('idCuestionario' => $this->input->post('idCuestionario'));
        if($data){
            $cuestionario = $this->AdminEncuesta_model->getCuestionarioId($data);
            if($cuestionario){
                 foreach ($cuestionario as $i) {
                    $cuenombre=array('name' => 'cuenombre','placeholder' => 'Escriba cuestionario','maxlength'=>'20','value'=>$i->cuenombre);
                    echo " <h4 class = 'text-center'>".form_label('Nombre:','cuenombre')."<br>".form_input($cuenombre)."</h4>";
                }   
            }else{
             echo "<tr><td>Sin Cuestionario</td></tr>";
            }
        }    
    }
    public function llenarReactivo(){
        $data = array('idReactivo' => $this->input->post('idReactivo'));
        if($data){
            $reactivo = $this->AdminEncuesta_model->getReactivoId($data);
            if($reactivo){
                 foreach ($reactivo as $i) {
                    $pregunta=array('name' => 'pregunta','placeholder' => 'Escriba la pregunta nuevamente','maxlength'=>'100','value'=>$i->pregunta);
                    echo " <h4 class = 'text-center'>".form_label('Preguanta:','pregunta')."<br>".form_textarea($pregunta)."</h4>";
                }   
            }else{
             echo "<tr><td>Sin Reactivo </td></tr>";
            }
        }    
    }
    public function llenarRespuesta(){
        $data = array('idRespuesta' => $this->input->post('idRespuesta'));
        if($data){
            $respuesta = $this->AdminEncuesta_model->getRespuestaId($data);
            if($respuesta){
                 foreach ($respuesta as $i) {
                    $respuesta=array('name' => 'respuesta','placeholder' => ' Reescribe respuesta', 'maxlength'=>'20','value'=>$i->respuesta);
                    echo " <h4 class = 'text-center'>".form_label('Respuesta:','respuesta')."<br>".form_input($respuesta)."</h4>";
                }   
            }else{
             echo "<tr><td>Sin Reactivo </td></tr>";
            }
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