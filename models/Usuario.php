<?php 
    class Usuario extends Conectar{
        /* Insertar correo electronico en la base de datos */
        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["correo"];
                $pass = $_POST["pass"];
                if(empty($correo) AND empty($pass)){
                    header("Location:".Conectar::ruta()."index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? AND usu_pass=? AND rol_id=2";
                    $sql = $conectar->prepare($sql);
                    $sql->bindValue(1, $correo);
                    $sql->bindValue(2, $pass);
                    $sql->execute();
                    $resultado = $sql->fetch();
                    if(is_array($resultado)==true and count($resultado)>0){
                        $_SESSION["usu_id"] = $resultado["usu_id"];
                        $_SESSION["usu_nom"] = $resultado["usu_nom"];
                        $_SESSION["usu_apep"] = $resultado["usu_apep"];
                        $_SESSION["usu_apem"] = $resultado["usu_apem"];
                        $_SESSION["usu_correo"] = $resultado["usu_correo"];
                        $_SESSION["usu_img"] = $resultado["usu_img"];
                        header("Location:".Conectar::ruta()."view/Home/");
                        exit();
                    }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        /* Listar todos los usuarios con rol_id = 1 */
        public function get_usuario(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE rol_id=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_usuario($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario SET est=0 WHERE usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>