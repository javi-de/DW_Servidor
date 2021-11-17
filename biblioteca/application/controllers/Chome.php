<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

        private $generos;
        private $contador;

	function __construct(){
                parent::__construct();            

                $this->load->model("Mlibros");
                $this->generos= $this->Mlibros->dameGeneros();
                $this->contador = 0;
	}

        public function index(){
                $this->genero();
        }

        public function genero($genero = false){
                //cogiendo los libros de la BD
                $libros = $this->Mlibros->cogerLibrosPorGenero($genero);

                //cargando las views
                $this->load->view("Vheader", ["generos" => $this->generos]);
                $this->load->view("Vlibros", ["genero" => $genero, "libros" => $libros]);
                $this->librosPrestadosYNoPrestados();
                $this->load->view("Vfooter");
        }

        private function librosPrestadosYNoPrestados(){
		if ( isset($_POST["butPrestar"]) && isset($_POST["checkLibro"]) ){
			$nombreLibros= $_POST["checkLibro"];
			$librosPrestados= [];
			$librosNoPrestados= [];

                        foreach ($nombreLibros as $nombreLibro) {
                               //se obtiene el idlibro para acceder a la tabla prestamos
                                $idLibro= $this->Mlibros->dameId($nombreLibro);
                                //echo "idLibro: ".$idLibro;
                                //echo "<br>";

                                //se comprueba el número de libros que se han prestado
				$numPrestados= $this->Mlibros->cuantosHayPrestados($idLibro);
				//echo "numPrestados: ".$numPrestados;
                                
				if ($numPrestados < 4){
                                        //se crea el array $campos para poder guardar en prestamos los libros que se puedan prestar
                                        $campos= [
                                                "fecha" => date("Y-m-d"), 
                                                "idlibro" => $idLibro
                                        ];
                                        $this->db->insert("prestamos", $campos);

					$librosPrestados[]= $nombreLibro;
                                }else
					$librosNoPrestados[]= $nombreLibro;
			}

                        //se crean dos variales para la view VlibrosPrestamos
			$this->load->view("VlibrosPrestamos", ["librosPrestados"=> $librosPrestados,
                                                                "librosNoPrestados"=> $librosNoPrestados
                                                              ]);
		}
	}

        /*
        public function calendario($fecha= false){
		// Loads view 
		$this->load->view('Vheader', ["generos" => $this->generos]);

		if ($fecha !== false) {
			$fechaLibros = $this->booksM->getLendsByDate($fecha);
			$this->load->view("Vcalendario", [
				"libros"=> $fechaLibros,
				"fecha"=> $fecha
			]);
		} else $this->load->view("Vcalendario", ["libros" => []]);
	}*/


/*************************parte 2************************** */
        public function prestamos(){
                $this->load->view("Vheader", ["generos" => $this->generos]);

                $todosLibrosPrestados= $this->Mlibros->dameTodosLibrosPrestados();

                if(isset($_POST["selectLibroPrestado"])){
                        $libroSelecccionado= $_POST["selectLibroPrestado"];

                        $this->session->set_userdata(["libroSelecccionado" => $libroSelecccionado]);
			$this->cargarLibrosPrestados($todosLibrosPrestados, $libroSelecccionado);

                }else{
                        if ($this->session->has_userdata("libroSelecccionado"))
                                $this->cargarLibrosPrestados($todosLibrosPrestados, $this->session->libroSelecccionado);
                        else
                                $this->load->view("parte2_VlibrosPrestados", ["todosLibrosPrestados" => $todosLibrosPrestados, "contador" => $this->contador]);
                }

                $this->load->view("Vfooter");
        }

        private function cargarLibrosPrestados($todosLibrosPrestados, $libroSelecccionado){
		$datosLibroPrestado= $this->Mlibros->dameDatosLibroPrestado($libroSelecccionado);
                $this->load->view("parte2_VlibrosPrestados",
                                                            ["todosLibrosPrestados" => $todosLibrosPrestados,
                                                             "libroSelecccionado" => $libroSelecccionado
                                                            ]);

                $this->load->view("parte2_VlinksPrestamos", ["datosLibroPrestado" => $datosLibroPrestado, "eliminar" => $this->session->has_userdata('borrar')]);
	}

        public function borrar($idLibro = false){
		if($idLibro!== false) {
			if($this->session->has_userdata('borrar')) {
				$_SESSION['borrar'][$idLibro] = $idLibro;
			} else {
				$_SESSION['borrar'] = [];
				$_SESSION['borrar'][$idLibro] = $idLibro;
			}
                }

		$this->prestamos();
	}

        public function eliminar(){
		$this->contador = 0;
		if($this->session->has_userdata('borrar')) {
			foreach ($this->session->borrar as $idLibro) {
                                $this->Mlibros->borrarLibroTablaPrestamos($idLibro);
				$this->contador++;
                                //echo "contador: ".$this->contador;
			}
			$this->session->unset_userdata(['borrar','libroSelecccionado']);
		}

		$this->prestamos();
	}

}





/*
        public function prestamos(){
                $this->load->view("Vheader", ["generos" => $this->generos]);

                //se cogen todos los libros prestados, para luego añadirlos al select de parte2_VlibrosPrestados
                $todosLibrosPrestados= $this->Mlibros->dameTodosLibrosPrestados();
                
                if(isset($_POST["selectLibroPrestado"])){
                        $libroSelecccionado= $_POST["selectLibroPrestado"];

                        $datosLibroPrestado= $this->Mlibros->dameDatosLibroPrestado($libroSelecccionado);
                        print_r($datosLibroPrestado);
                        $this->load->view("parte2_VlibrosPrestados",
                                          ["todosLibrosPrestados" => $todosLibrosPrestados,
                                           "libroSelecccionado" => $libroSelecccionado
                                          ]);

                        $this->load->view("parte2_VlinksPrestamos", ["datosLibroPrestado" => $datosLibroPrestado]); 
                }else
                        $this->load->view("parte2_VlibrosPrestados", ["todosLibrosPrestados" => $todosLibrosPrestados]);
                
   
                $this->load->view("Vfooter");
        }

*/