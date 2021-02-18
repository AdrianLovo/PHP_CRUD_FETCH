<?php
   
    require_once("../DAO/DAOPublicacion.php");
    require_once("../Models/Publicacion.php");

    if(isset($_POST)){   
        $opcion = $_POST['opcion'];    
        
        switch ($opcion) {
		    case "insert":
                agregar();              
			break;		
            case "select":
                listar();
			break;	
        }   

    }
    
    function agregar(){
        $nombre = $_FILES['imagen']['name'];
        $nombreTemp = $_FILES['imagen']['tmp_name'];
        $comentario = $_POST['comentario'];
        $destino = "../../public/img/".date('YmdHis').$nombre;
        $fecha = date('Y-m-d H:i:s');

        $daoPublicacion = new DaoPublicacion();
        $publicacion = new Publicacion("", $destino, $comentario, date('Y-m-d H:i:s'), $fecha);
        $id = $daoPublicacion->agregar($publicacion);

        if($id > 0){
            move_uploaded_file($nombreTemp, $destino);
            $datos = array('IdURL' => $id,	'URL' => $destino, 'Comentario' => $comentario, 'Fecha' => $fecha);     
            echo json_encode($datos);	    //Retornar elemento agregado
        }else{
            echo("error");
        }
    }

    function listar(){
		$datosTodos = array();
        $daoPublicacion = new DaoPublicacion();

		foreach ($daoPublicacion->listar() as $publicacion) {
			$temp = $publicacion->toArray();
			$datos = array('IdURL' => $temp[0],	'URL' => $temp[1], 'Comentario' => $temp[2], 'Fecha' => $temp[3]);
			$datosTodos[] = $datos;	
		}
		echo json_encode($datosTodos);	
	}
