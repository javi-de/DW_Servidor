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

  function librosDe($genero){
    $this->db->select('titulo');
    $this->db->from('libros');
    $this->db->where('genero', $genero);
    $query = $this->db->get();

    foreach ($query->result() as $row){
      $titulos[] = $row->titulo;
    }

    return $titulos;
  }


}
?>