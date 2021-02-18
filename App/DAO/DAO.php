<?php

    require_once("Conexion.php");

    abstract class DAO extends Conexion{

		abstract function queryListar();		
        abstract function queryAgregar();		
		abstract function queryEliminar();		

        abstract function metodoListar($statement);
        abstract function metodoAgregar($statement, $parametro);
		abstract function metodoEliminar($statement, $parametro);				



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

		/*
		* Metodo para eliminar registrosa de la tabla "persona" segun "id"
		* @access: public
		* @param:  $parametro (int indicando identificado)		
 		* @return: $filasAfectadas (int de registros eliminados)
 		*/
		 public function eliminar($parametro) {
			$pdo = $this->conectar();
			try{
				$statement = $pdo->prepare($this->queryEliminar());
				$filasAfectadas = $this->metodoEliminar($statement, $parametro);
				$pdo = null;
				return $filasAfectadas;
			}catch(Exception $e){
				LogError::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$pdo = null;
			}
		}

    }
