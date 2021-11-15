<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cautores extends CI_Controller {

	function __construct(){
            parent::__construct();            
            $this->load->model('mautores');
	}

	public function index()
	{
        //TITULO
        $na=$this->mautores->cuantosautores();
        $nl=$this->mautores->cuantoslibros();
        $data['mensaje']= $na." autores y ".$nl ." libros";
        $this->load->view('v_titulobiblio',$data);
        
         //ENLACES A AUTORES para ver sus libros
        $data['arrayautores'] = $this->mautores->todosautores(); 

		//$arrayautores tiene objetos (idautor,nombre)        
        $this->load->view('v_autores',$data);
            
        $this->load->view('vpie');
    }

}
