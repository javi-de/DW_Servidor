<?php
class Mlibros extends CI_Model
{
  function __construct(){
    parent::__construct();
  }   

  /********************************************************** */
  function dameGeneros(){
    $generos = [];

    $this->db->select('genero');
    $this->db->from('libros');
    $this->db->distinct();        
    $query = $this->db->get();

    foreach ($query->result() as $fila){
        $generos[] = $fila->genero;
    }

    return $generos;
  }

  /********************************************************** */
  function cogerLibrosPorGenero($genero = false){
    $libros= [];
    
    $this->db->select('titulo, nombre');
    $this->db->from('libros, autores');
    $this->db->where('libros.idautor= autores.idautor');

    if($genero!== false)
      $this->db->where('genero', $genero);

    $query= $this->db->get(); //devuelve dos valores: titulo(de libros) y nombre(de autores)

    foreach ($query->result() as $fila){
      $libros[] = ["titulo" => $fila->titulo,
                    "autor" => $fila->nombre
                   ];
    }

    return $libros;
  }

  /********************************************************** */
  function dameId($nombreLibro){
    $this->db->select("idlibro");
    $this->db->from("libros");
    $this->db->where("titulo", $nombreLibro);

    $query= $this->db->get();

    $idLibro= $query->result();

    return $idLibro[0]->idlibro;
  }
  
  function cuantosHayPrestados($idlibro) {
    $this->db->select("count(*) as cant");
    $this->db->from("prestamos");
    $this->db->where("idlibro", $idlibro);
    $query= $this->db->get();
    
    $cantidad= $query->result();

    return $cantidad[0]->cant;
  }
  
  /********************************************************** */

  
  
  
  /*************************parte 2************************** */
  function dameTodosLibrosPrestados(){
    $todosPrestados=[];

    $this->db->select("prestamos.idlibro, titulo");
    $this->db->from("prestamos, libros");
    $this->db->where("libros.idlibro= prestamos.idlibro");
    $this->db->distinct();

    $query= $this->db->get();

    foreach ($query->result() as $fila) {
      $todosPrestados[$fila->idlibro]= $fila->titulo;
    }

    return $todosPrestados;
  }

  function dameDatosLibroPrestado($idLibro){
    $librosPrestados= [];

    $this->db->select("idprestamo, fecha");
    $this->db->from("prestamos");
    $this->db->where("idlibro", $idLibro);
    $this->db->distinct();

    $query= $this->db->get();

    foreach ($query->result() as $fila) {
      $librosPrestados[]= [
                          "idprestamo" => $fila->idprestamo,
                          "fecha" => $fila->fecha,
                        ];

    }

    return $librosPrestados;
  }

  function borrarLibroPrestado($lend){
    $this->db->where('idprestamo', $lend);
    $this->db->borrar('prestamos');
    return $this->db->affected_rows() >= 1;
}
}
?>