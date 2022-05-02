<?php 
    /* LLamada a la cadena de conexion */
    require_once("../config/conexion.php");
    /* LLamando a la Clase */
    require_once("../models/Usuario.php");
    /* Inicializamos la Clase */
    $usuario = new Usuario();

    /* Opcion de solicitud del controller */
    switch($_GET["op"]){
        /* Eliminar segun el ID */
        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
            break;
        /* Servicio para listar todos los usuarios */
        case "listar":
            $datos = $usuario->get_usuario();
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["usu_correo"];
                if($row["est"]=="1"){
                    $sub_array[] = '<span class="badge badge-success">Suscrito</span>';
                }else{
                    $sub_array[] = '<span class="badge badge-danger">No Suscrito</span>';
                }
                if($row["est"]=="1"){
                    $sub_array[] = '<button type="button" onclick="eliminar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-outline-danger"><i class="bx bx-trash"></i></button>';
                }else{
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="bx bx-trash"></i></button>';
                }
               
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($datos),
                "aaData"=>$data
            );
            
            echo json_encode($results);
            break;
    }
?>