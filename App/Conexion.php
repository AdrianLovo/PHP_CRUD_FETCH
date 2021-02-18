<?php

    class Conexion{

        public function conectar(){
            try{
                $pdo = new PDO("mysql:host=localhost;bdname=bdfetch","prueba","M3gaman121212");
                return $pdo;
            }catch(PDOException $e){
                echo($e);
                $pdo = null;
            }
        }
        
        public function desconectar(){
            $this->pdo = null;
        }

        public function __destruct(){
            $this->pdo = null;	
        }
    
    }

	echo("Hola");
