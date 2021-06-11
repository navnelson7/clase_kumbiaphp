<?php  
    class ProfesoresController extends AppController{
        public function index($page=1){
            View::template('pantalla1');
            $this->titulo = "Profesores";
            $profesor = new Profesores();
            $this->listaProfesores = $profesor->getProfesores($page);
        }

        public function historial(){
            View::template('pantalla1');
            $this->titulo = "Historial de Profesores";
        }

        public function create(){
            View::template('pantalla1');
            $this->titulo = "Registro de Probresores";
            if(Input::hasPost('profesores')){
                $profesor = new Profesores(Input::post('profesores'));
                if($profesor->create()){
                    Flash::valid("Profesor Guardado");
                    Input::delete();
                    return Redirect::to();

                }else{
                    Flash::error("No se guardo profesor");
                }
            }
        }
    }