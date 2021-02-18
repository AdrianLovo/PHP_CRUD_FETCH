<?php

    require_once("DAO.php");
    require_once("../Models/Publicacion.php");
        
    class DAOPublicacion extends DAO{

        public function queryAgregar(){
			$query = "INSERT INTO bdfetch.url(URL, Comentario, Fecha) VALUES(?, ?, ?)";
			return $query;
		}

		public function metodoAgregar($statement, $parametro){
			try{
				$statement->execute([$parametro->getURL(), $parametro->getComentario(), $parametro->getFecha()]);
			}catch(Exception $e){
				echo($e);
			}			
		}

		public function queryListar(){
			$query = "SELECT * FROM bdfetch.url";
			return $query;
		}

		public function metodoListar($resultSet){
			$arrayDeObjetos = array();
			if(!empty($resultSet)){
				foreach($resultSet as $fila){
					$a = new Publicacion($fila[0], $fila[1], $fila[2], $fila[3]);
					array_push($arrayDeObjetos, $a);
				}	
			}	
			return $arrayDeObjetos;
		}


		public function queryEliminar(){
			$query = "DELETE FROM bdfetch.url WHERE IdURL = ?";
			return $query;
		}

		public function metodoEliminar($statement, $parametro){
			$statement->execute([$parametro]);
			$filasAfectadas = $statement->rowCount();
			return $filasAfectadas;
		}

    }

