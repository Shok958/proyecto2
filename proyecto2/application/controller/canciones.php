<?php

class Canciones extends Controller
{
	public function index(){

		$titulo = "Canciones";
		$this->view->render('canciones/index', ['titulo' => 'Canciones']);
	}

	public function listar() {

		$canciones = $this->model->getAllSongs();
		$this->view->render('canciones/listar',
							['canciones' => $canciones,
							 'titulo'	 => 'Listado de Canciones'
							]);

	}

	public function ver($id = 0){

		$id = (int) $id;

		if ($id == 0) {
			header("location: /canciones/listar");
		} else {
			$cancion = $this->model->getSong($id);
			$this->view->render('canciones/ver',
								['cancion'	=> $cancion,
								 'titulo'	=> 'Canción'
								]);
		}

	}
}