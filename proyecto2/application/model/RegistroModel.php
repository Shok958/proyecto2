<?php

class RegistroModel
{
    public static function doregister($datos) {

        $conexion = Database::getInstance()->getDatabase();
        $registrar = Database::getInstance()->registrar($datos,$conexion);
        if ($registrar){
            echo "cool bro";
           // header('location: login/index');
        }else{
            echo "so sad bro";
        }

    }


}