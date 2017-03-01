<?php
    class Ejemplo extends Controller{

        public function index(){
            echo "Estoy en index del controlador ejemplo";
        }

        public function acercade(){
            echo "Somos el curso de 2º de DAW";
        }

        public function contenido($numero){
            echo "Somos $numero alumnos en 2º DAW";
        }
    }
?>