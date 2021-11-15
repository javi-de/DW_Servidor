<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

	function __construct(){
        parent::__construct();            

        $this -> load -> model('Mlibros');
	}

	public function index(){
        //*****parametros post/get


        //*****acceso bd


        //*****carga de vistas
        //$this->load->view('v_titulobiblio');

        $generos= $this->Mlibros->dameGeneros();
        $this -> load -> view("v_titulobiblio", ["generos" => $generos]);

        $titulos= $this->Mlibros->librosDe();
        $this -> load -> view("v_titulobiblio", ["titulos" => $titulos]);

        $this->load->view('v_pie');
    }

}