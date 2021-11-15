<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clibros extends CI_Controller {

	public function librosautor($idautor){
		//Aqui llega al pinchar  nombre-autor (link) en vista autores
        
        $this->load->model('mautores');
        $autor=$this->mautores->autordeid($idautor);
		//Devuelve un objeto autor (con  nombre, fechanac, nac..)
       
        $nombreautor=$autor->nombre;
        $data['arraylibros']=
		$this->mautores->librosautor($idautor);
       	//$arraylibros: array de arrays (cada subarray(libro)
        //tiene idlibro, titulo, paginas, genero
     
    	$data['mensaje']="LIBROS DEL AUTOR $nombreautor";
        $this->load->view('v_titulobiblio',$data);
        $this->load->view('v_librosautor',$data);
        $this->load->view('vpie');
    }       


}
