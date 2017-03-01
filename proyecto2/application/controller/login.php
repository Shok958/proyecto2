<?php

class Login extends Controller 
{
	public function index(){

		echo $this->view->render('login/index');

	}
    //1º pulso el boton login
    //2º hago las validaciones del login
    //3-1 val ok controlador llama a una vista de login ok
    //3-2 val ko controlador llamo a vista error de login  y le paso los errores
    //4 si paso las validaciones 3-1 voy al modelo y le paso los datos del login e intento y compruebo si existe la base datos
    //4-1 si existe la bd me voy a la vista usuario logueado
    //4-2 si no existe en la bd llamo a la vista login y muestro el error
	public function dologin(){

	    $validar = new Validation();
	    $validar->validarMail($_POST['email']);
	    //$validar->validarPassword($_POST['clave']);
        $nabo = $validar->mostrarErrores();
	    if ($nabo == true){
            if(LoginModel::dologin($_POST)){

                if($origen = Session::get('origen')) {

                    Session::set('origen', NULL);
                    header('location:' . $origen);
                    exit();

                } else {

                    echo $this->view->render('login/usuariologueado');

                }

            } else {

                echo $this->view->render('login/index');

            }
        }else{
	        if (empty($nabo)){
	            $nabo = " ";
            }
            echo $this->view->render('login/index', array("nabo" => $nabo));
        }
	}

	public function salir() {

		LoginModel::salir();

	}
}