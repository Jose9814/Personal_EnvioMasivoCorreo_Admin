<?php 
        /* LLamada a la cadena de conexion */
        require_once("../config/conexion.php");
        /* LLamando a la Clase */
        require_once("../models/Email.php");
        /* Inicializamos la Clase */
        $email = new Email();

        switch($_GET["op"]){

            case "enviarcorreo":
                $email->enviar_correo();
                break;
        }
?>