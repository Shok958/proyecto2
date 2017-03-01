<?php

class Registrar extends Controller
{

    public function index()
    {
        echo $this->view->render('registrar/index');
    }

    public function doregister(){

        if(RegistroModel::doregister($_POST)){

            if($origen = Session::get('origen')) {

                Session::set('origen', NULL);
                header('location:' . $origen);
                exit();

            } else {

                echo $this->view->render('login/index');

            }

        } else {

            echo $this->view->render('registrar/index');

        }

    }
}
