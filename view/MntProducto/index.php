<?php 
    require_once("../../config/conexion.php");
    if(isset($_SESSION["usu_id"])){
?>
<!doctype html>
<html lang="es">
    <head>
        <?php require_once("../html/MainHead.php"); ?>
        <title>Mnt Producto</title>
    </head>
    <body>
        <!-- Start Sidemenu Area -->
        <?php require_once("../html/MainMenu.php"); ?>
        <!-- End Sidemenu Area -->

        <!-- Start Main Content Wrapper Area -->
        <div class="main-content d-flex flex-column">

            <!-- Top Navbar Area -->
            <?php include_once("../html/MainNavbar.php"); ?>
            <!-- End Top Navbar Area -->
            
            <!-- Breadcrumb Area -->
            <div class="breadcrumb-area">
                <h1>Mantenimiento de Producto</h1>

                <ol class="breadcrumb">
                    <li class="item"><a href="../Home/"><i class='bx bx-home-alt'></i></a></li>

                    <li class="item">Mnt de Producto</li>
                </ol>
            </div>
            <!-- End Breadcrumb Area -->
            
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Listado de Productos</h3>
                    <br>
                    <button onclick="nuevo()" class="btn btn-outline-primary" id="btnnuevoproducto">Nuevo</button>
                </div>
                
                <div class="card-body">
                    <table id="producto_data" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descto</th>
                                <th>Cupon</th>
                                <th></th>
                                <th></th> 
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex-grow-1"></div>

            <!-- Start Footer End -->
            <?php require_once("mntmantenimiento.php"); ?>
            <?php require_once("../html/MainFooter.php"); ?>
            <!-- End Footer End -->

        </div>
        <!-- Js -->
        <?php require_once("../html/MainJs.php"); ?>
        <script type="text/javascript" src="mntproducto.js"></script>
    </body>
</html>
<?php 
    }else{
        header("Location:".Conectar::ruta()."../../index.php");
    }
?>