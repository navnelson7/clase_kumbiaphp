<?php
    Load::models('alumnos');
    class AlumnosController extends AppController{
        public function index($page=1){
            View::template('pantalla1');
            $this->titulo = "Listado Alumnos";
            $alumno = new Alumnos();
            $this->listaAlumno = $alumno->getAlumnos($page);
        }

        public function registro(){
            View::template('pantalla1');
            $this->titulo = "Registro de alumnos";
        }

        public function create(){
                View::template('pantalla1');
                if(Input::hasPost('alumnos')){
                    $alumno = new Alumnos(Input::post('alumnos'));
                    if($alumno->create()){
                        Flash::valid('operacion exitosa');
                        Input::delete();
                    }else{
                        Flash::error('fallo al guardar');
                        
                    }
                }
        }
        public function edit($id){
            View::template('pantalla1');
            $alumno = new Alumnos();
            if(Input::hasPost('alumnos')){
                if(!$alumno->update(Input::post('alumnos'))){
                    Flash::error("No se actualizo el registro");
                }else{
                    Flash::valid("Actualizado el alumno");
                    return Redirect::to();

                }
            }else{
                $this->alumnos = $alumno->find((int) $id);
            }
        }

        public function del($id){
            $alumno = new Alumnos();
            if(!$alumno->delete((int) $id)){
                Flash::error('Error al borrar el alumno');
            }else{
                Flash::valid("Alumnos Borrado");
            }

            return Redirect::to();
        }
    }