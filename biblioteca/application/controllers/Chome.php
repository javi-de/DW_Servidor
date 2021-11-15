<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

	function __construct(){
            parent::__construct();            
           
	}

	public function index(){
        //parametros post/get

        //acceso bd

        //carga de vistas
        $this -> load -> view('v_titulobiblio');
        //$this -> load -> view('v_titulobiblio',["mensaje" => "holi"]);

        
        $this -> load -> view('v_pie');
    }

}