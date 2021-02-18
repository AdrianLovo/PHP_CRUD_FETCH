<?php

    class Publicacion{

		private $IdURL;
		private $URL;
		private $Comentario;
        private $Fecha;
        
        public function __construct($IdURL, $URL, $Comentario, $Fecha){
            $this->IdURL = $IdURL;
            $this->URL = $URL;
            $this->Comentario = $Comentario;
            $this->Fecha = $Fecha;
        }

        public function getIdURL(){
            return $this->IdURL;
        }
    
        public function setIdURL($IdURL){
            $this->IdURL = $IdURL;
        }
    
        public function getURL(){
            return $this->URL;
        }
    
        public function setURL($URL){
            $this->URL = $URL;
        }
    
        public function getComentario(){
            return $this->Comentario;
        }
    
        public function setComentario($Comentario){
            $this->Comentario = $Comentario;
        }
    
        public function getFecha(){
            return $this->Fecha;
        }
    
        public function setFecha($Fecha){
            $this->Fecha = $Fecha;
        }

        //Metodo para obtener los datos de los atributos en un array
		public function toArray(){
			$datos = array($this->IdURL, $this->URL, $this->Comentario, $this->Fecha);
			return $datos;
		}   

        //Metodo toString para mostrar campos de objeto
        public function toString(){
            echo(
                "IdURL: " . $this->IdURL .
                "URL: " . $this->URL .
                "Comentario: " . $this->Comentario .
                "Fecha: " . $this->Fecha 
            );
        }

	}

