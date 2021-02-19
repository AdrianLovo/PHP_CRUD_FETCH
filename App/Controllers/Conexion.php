<?php

    class Conexion{

        public function conectar(){
            try{
                //Agregar credenciales BD
                $pdo = new PDO("mysql:host=127.0.0.1;bdname=bdfetch","root","");
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
