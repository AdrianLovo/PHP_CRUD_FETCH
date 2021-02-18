<?php

    require_once("Conexion.php");

    abstract class DAO extends Conexion{

        abstract function queryAgregar();		
        abstract function metodoAgregar($statement, $parametro);

		abstract function queryListar();		
        abstract function metodoListar($statement);

       /*
        * Metodo para agregar elemento 
        * @access: public
        * @return: id insertado 
        */
        public function agregar($parametro){
			$pdo = $this->conectar();
			try{
				$statement = $pdo->prepare($this->queryAgregar());
				$this->metodoAgregar($statement, $parametro);				
				$id = $pdo->lastInsertId();
				$pdo = null;
				return $id;
			}catch(Exception $e){
				echo($e);
			}finally{
				$pdo = null;
			}
		}

		/*
		* Metodo para listar todos los elementos de tabla "X"
 		* @access: public
 		* @return: array() de objetos "X" 
 		*/
		 public function listar() {
			$arrayDeObjetos = array();
			$pdo = $this->conectar();
			try {
				$resultSet = $pdo->query($this->queryListar());
				$arrayDeObjetos = $this->metodoListar($resultSet);
				$pdo = null;
				return $arrayDeObjetos;
			} catch (Exception $e) {
				LogErro::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$pdo = null;
			}
		}		

    }
