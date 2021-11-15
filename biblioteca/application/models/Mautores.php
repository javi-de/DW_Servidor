<?php
class Mautores extends CI_Model
{
  function __construct(){
    parent::__construct();
  }   

  function cuantoslibros(){
    //$db=$this->load->database(); No hace falta porque ya se ha cargado con autoload 
    $rs=$this->db->query("select titulo from libros");
    return $rs->num_rows();        
  }

  function cuantosautores(){        
    $rs=$this->db->query("select * from autores");
    return $rs->num_rows();
  }
 
  function todosautores(){        
    $rs=$this->db->query("select idautor, nombre from autores");

    //  $rs->result();   
    //Array de objetos (Cada objeto id y autor como atributos)

    //  $rs->result_array()  
    //Array de arrays (Cada array tiene 2 posiciones, una con clave //'idautor', otra con clave 'nombre'
      
    return $rs->result();
  }

  function autordeid($idautor)
  {
    $rs=$this->db->query("select nombre,fechanac, nacionalidad from autores where idautor=$idautor");
    return $rs->row();  //Devuelve un objeto autor (con  nombre, fechanac, nacionalidad)
  }
    

  function librosautor($idautor)
  {
    $rs=$this->db->query("select idlibro, titulo, paginas, genero from libros where idautor=$idautor");
    return $rs->result_array();  //Devuelve array de arrays (cada subarray(libro) tiene idlibro, titulo, paginas, genero)             
  }
    
}
?>