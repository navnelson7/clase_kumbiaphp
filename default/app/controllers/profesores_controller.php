<?php  
    class ProfesoresController extends AppController{
        public function index(){
            View::template('pantalla1');
            $this->titulo = "Profesores";
        }

        public function historial(){
            View::template('pantalla1');
            $this->titulo = "Historial de Profesores";
        }
    }