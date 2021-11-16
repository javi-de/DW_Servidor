<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

	function __construct(){
        parent::__construct();            

        $this->load->model('Mlibros');
	}

        public function index(){
                $this->genero();
        }

        public function genero($genero = false){
                //cogiendo los libros de la BD
                $libros = $this->Mlibros->cogerLibrosPorGenero($genero);

                //cargando las views
                $generos= $this->Mlibros->dameGeneros();
                $this->load->view("Vheader", ["generos" => $generos]);
                $this->load->view('Vlibros', ["genero" => $genero, "libros" => $libros]);
                //$this->lend();
                $this->load->view('Vfooter');
        }

}