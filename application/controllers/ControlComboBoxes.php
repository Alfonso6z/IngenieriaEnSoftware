<?php
class ControlComboBoxes extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('AdminEncuesta_model');
    }
    public function estudioCuestionario() {
        $data =array( 'idEstudio' => $this->input->post('idEstudio'));
        if($data){
            $cuestionarios = $this->AdminEncuesta_model->getCuestionarioEstudio($data);
            echo '<option value="0">Cuestionarios</option>';
            foreach($cuestionarios as $i){
                echo '<option value="'. $i->idCuestionario .'">'. $i->cuenombre .'</option>';
            }
        }  else {
            echo '<option value="0">Cuestionarios</option>';
        }
    }

    public function cuestionarioReactivo() {
        $data =array( 'idCuestionario' => $this->input->post('idCuestionario'));
        if($data){
            $reactivos = $this->AdminEncuesta_model->getReactivoCuestionario($data);
            echo '<option value="0">Preguntas</option>';
            foreach($reactivos as $fila){
              echo '<option value="'. $fila->idReactivo.'">'. $fila->pregunta .'</option>';
            }
        }  else {
             echo '<option value="0">Preguntas</option>';
        }
    }

    public function reactivoRespuesta() {
        $data =array( 'idReactivo' => $this->input->post('idReactivo'));
        if($data){
            $respuestas = $this->AdminEncuesta_model->getRespuestas($data);
            foreach ($respuestas as $i) {
                echo "<tr><td>".$i->resnombre."</td></tr>";
            }   
        }
    }
    
}