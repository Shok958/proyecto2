<?php

class PreguntasModel
{
	public static function getAll() {

		$conexion = Database::getInstance()->getDatabase();

		$ssql = "SELECT * FROM preguntas";
		$query = $conexion->prepare($ssql);
		$query->execute();

		return $query->fetchAll();

	}

	public static function insert($datos) {

		$conexion = Database::getInstance()->getDatabase();

		$errores_validacion = false;
		if(empty($datos['asunto'])) {

			Session::add('feedback_negative', 'No he recibido el asunto de la pregunta');
			$errores_validacion = true;

		}
		if (empty($datos['cuerpo'])) {

			Session::add('feedback_negative', 'No he recibido el cuerpo de la pregunta');
			$errores_validacion = true;

		}
		if ($errores_validacion) {

			return false;

		}

		$params = [':asunto'	=>	$datos['asunto'],
				   ':cuerpo'	=>	$datos['cuerpo']
				  ];

		$ssql = "INSERT INTO preguntas (asunto, cuerpo) 
				 VALUES (:asunto, :cuerpo)";
		$query = $conexion->prepare($ssql);
		$query->execute($params);

		$cuenta = $query->rowCount();
		if($cuenta == 1)
		 	return $conexion->lastInsertId();
		 return false;

	}

	public static function getId($id) {

		$conexion = Database::getInstance()->getDatabase();

		$id = (int) $id;

		if ($id == 0) return false;

		$ssql = "SELECT * FROM preguntas WHERE id_pregunta = :id";
		$query = $conexion->prepare($ssql);
		$query->bindValue(":id", $id, PDO::PARAM_INT);
		$query->execute();

		return $query->fetch();

	}

	public static function edit($datos) {

		$conexion = Database::getInstance()->getDatabase();

		$errores_validacion = false;

		if (empty($datos['id_pregunta'])) {

			Session::add('feedback_negative', 'No he recibido la pregunta');
			$errores_validacion = true;
		}

		if (empty($datos['asunto'])) {

			Session::add('feedback_negative', 'No he recibido el asunto de la pregunta');
			$errores_validacion = true;
		}

		if (empty($datos['cuerpo'])) {

			Session::add('feedback_negative', 'No he recibido el cuerpo de la pregunta');
			$errores_validacion = true;
		}

		if ( $errores_validacion ) {

			return false;

		}

		$ssql = "UPDATE preguntas 
				 SET asunto=:asunto, cuerpo=:cuerpo
				 WHERE id_pregunta=:id";

		$query = $conexion->prepare($ssql);
		$params = [ ':asunto'	=>	$datos['asunto'],
					':cuerpo'	=>	$datos['cuerpo'],
					':id'		=>	$datos['id_pregunta']
				  ];
		$query->execute($params);
		$count = $query->rowCount();
		if ($count == 1) {

			Session::add('feedback_positive', 'Editado con éxito, gracias!!!');
			return true;
		}

		Session::add('feedback_positive', 'Actualizadas 0 casillas');
		return true;

	}



}