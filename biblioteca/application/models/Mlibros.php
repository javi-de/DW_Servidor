<?php
class Mlibros extends CI_Model
{
  function __construct(){
    parent::__construct();
  }   
  /*
  function cogerGeneros(){
    $this->db->select('');
    $this->db->from('');
  }*/

  function dameGeneros(){
    $generos = [];

    $this->db->select('genero');
    $this->db->from('libros');
    $this->db->distinct();        
    $query = $this->db->get();

    foreach ($query->result() as $row){
        $generos[] = $row->genero;
    }

    return $generos;
  }

  function cogerLibrosPorGenero($genero = false){
    $libros= [];
    
    $this->db->select('titulo, nombre');
    $this->db->from('libros, autores');
    $this->db->where('libros.idautor= autores.idautor');

    if($genero!== false)
      $this->db->where('genero', $genero);

    $query = $this->db->get();

    foreach ($query->result() as $row){
      $libros[] = ["titulo" => $row->titulo,
                    "autor" => $row->nombre
                   ];
    }

    return $libros;
  }

  
}
?>