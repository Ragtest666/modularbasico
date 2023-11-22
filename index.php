<!DOCTYPE html>
<?php
require_once("control/validarusuario.php");
if (!isset($_SESSION['nombre'])) {
    header("Location:signin.php");
}
include("control/eliminarcliente.php");
$usuario = $_SESSION["nombre"];
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Agregar Pedidos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!--Add icons from googlefonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar naranja navbar-dark">
                <a href="index.php" class="mx-4 d-lg-block d-sm-block">
                    <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3 pt-4">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link active"><i class="fa fa-user-edit me-2"></i>Clientes</a>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>Pedidos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_pedido.php" class="dropdown-item active">Agregar pedido</a>
                            <a href="consultar_pedido.php" class="dropdown-item">Consultar pedido</a>
                            <a href="editar_pedido.php" class="dropdown-item">Editar Pedido</a>
                        </div>
                    </div>
                    <a href="historial.php" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Historial</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="fa fa-bars me-2"></i>Productos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="AgregarProducto.php" class="dropdown-item">Agregar Producto</a>
                            <a href="" class="dropdown-item">Ver Producto</a>
                            <a href="" class="dropdown-item">Editar Producto</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand rojizo navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none d-sm-block me-4">
                    <h2 class="text-primary mb-0"> <img src="img/Logo.png" width="200" height="80"><i class="fa "></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control cafeclaro border-0" type="search" placeholder="Buscar">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end cafeoscuro border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Ajustes</a>
                            <a href="control/cerrar.php" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- container star -->
            <div class=" container-fluid pt-3 px-3">
                <div class="cafeclaro rounded p-4 ">

                    <!-- Titulo Agregar Producto star -->

                    <a href="index.php" class="link">Clientes</a>
                    <label class="gris">></label>
                    <a href="agregar_pedido.php" class="link">Mostrar clientes</a>


                    <!-- Titulo Datos del Producto End -->

                    <!-- Container Agregar Pedido Start -->

                    <!-- cabecera Datos producto star -->

                    <div class="naranja rounded h-100 p-2 row">
                        <div class="col d-flex h-100">
                            <h5 class="text-center  mb-0">Clientes</h5>
                            <button class="btn" style="float:right; position:relative; margin-left:auto; text-decoration:none;"><a href="agregar_cliente.php">+</a></button>
                        </div>
                    </div>

                    <!-- cabecera Datos producto End -->

                    <div class="cafeoscuro rounded h-100 p-4  row ">
                        <div class=" text-center rounded p-4 row  ">

                            <!--card de clientes-->
                            <form action="" method="POST">
                                <div class="card-body px-1 py-0  ">
                                    <div class="row g-0 text-center fs--1">
                                        <?php
                                        require("control/conexion.php");
                                        $sqlcliente = "SELECT * FROM Clientes;";
                                        $consulta = mysqli_query($conexion, $sqlcliente);
                                        while ($fila = mysqli_fetch_array($consulta)) {
                                            printf(
                                                '
                                            <div class="col-6  col-md-4 col-lg-3 col-xxl-2 mb-1">
                                                    <div class="con p-3 h-100"><a href="ConsultarCliente.php"><img class="img-thumbnail img-fluid rounded-circle mb-3 bordercolor shadow-sm" src="%s" alt=""style="width:150px; height:150px;" /></a>
                                                        <h5 class=" mb-1"><a class="fuente" class="fuente" href="#"><b>%s</b></a></h5>
                                                        <h6 class=" mb-1"><a class="fuente" class="fuente" href="#">%s</a></h6>

                                                        <p class=" fs--2 mb-1"><a class="fuente" href="#">Tel: %s</a></p>
                                                    </div>
                                                    <div class="d-inline">
                                                        <button class="btn " data-bs-toggle="modal" data-bs-target="#editModal%s"><span class="material-symbols-outlined">edit</span></button>
                                                        <button class="btn " name="ver" value=%s><span class="material-symbols-outlined">visibility</span></button>
                                                        <button class="btn " name="eliminar" value=%s><span class="material-symbols-outlined">delete</span></button>
                                                    </div>
                                            </div>
                                            <!-- Modal de edición -->
                                            <div class="modal fade" id="editModal%s" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header naranja">
                                                            <h5 class="modal-title" id="editModalLabel">Editar Cliente</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body cafeoscuro">
                                                            

                                                                <div class="col-sm-12 col-xl-6  ">
                                
                                                                    <label for="floatingTextarea" class="Text">Nombre del cliente *</label>
                                                                    <input class="form-control mb-3" type="text" name="nombre"  value="%s" required placeholder="">
                                                                    <label for="floatingTextarea" class="Text">Numero de telefono *</label>
                                                                    <input class="form-control p_input mb-3" type="number" name="telefono" value="%s" required placeholder="">
                                
                                
                                                                    <label for="floatingTextarea" class="Text">Correo Electrónico</label>
                                                                    <input class="form-control mb-3" type="email" name="correo" value="%s" placeholder="">
                                                                    <label for="floatingTextarea" class="Text">Direccion</label>
                                                                    <input class="form-control mb-3" type="text" name="direccion" value="%s" placeholder="">
                                                                    <label for="floatingTextarea" class="Text">Colonia</label>
                                                                    <input class="form-control mb-3" type="text" name="colonia" value="%s" placeholder="">
                                                                </div>
                                
                                                                <div class="col-sm-12 col-xl-6  row">
                                                                    <div class="col-sm-12 col-xl-6 ">
                                                                        <label for="floatingTextarea" class="Text">Tipo Local *</label>
                                                                        <input class="form-control mb-3" type="text" name="tipo_local" value="%s" required placeholder="">
                                                                        <label for="floatingTextarea" class="Text">Codigo Postal</label>
                                                                        <input class="form-control mb-3" type="text" name="codigo_postal" placeholder="">
                                                                    </div>
                                                                    <div class="col-sm-12 col-xl-6 ">
                                                                        <label for="floatingTextarea" class="Text">Número Interior</label>
                                                                        <input class="form-control mb-3" type="text" name="num_interior" placeholder="">
                                                                        <label for="floatingTextarea" class="Text">Numero Exterior</label>
                                                                        <input class="form-control mb-3" type="text" name="num_exterior" placeholder="">
                                                                    </div>
                                
                                                                    <div class="h-230 ">
                                                                        <div class=" text-center col-sm-12 col-lg-12 hoverbox feed-profile ">
                                                                            <img class=" bg-white img-thumbnail shadow-sm" src="https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg" style="width: 300px; height: 230px " alt="avatar" id="img" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="col-sm-12 col-lg-12 mt-3">
                                                                    <div class=" row ">
                                                                        <div class="text-center col-6"><input class="desactiveFiles" type="file" name="imagen" id="foto" accept="image/*" /><label class="labell" for="foto">Seleccionar foto</label></div>
                                                                    </div>
                                                                </div>
                                                            

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="button" class="btn btn-primary" name="update">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            ',
                                                $fila["imagen"],
                                                $fila["nombre"],
                                                $fila["direccion"],
                                                $fila["telefono"],
                                                $fila["id"],
                                                $fila["id"],
                                                $fila["id"],
                                                $fila["id"],
                                                $fila["nombre"],
                                                $fila["telefono"],
                                                $fila["correo"],
                                                $fila["direccion"],
                                                $fila["colonia"],
                                                $fila["tipo_local"],
                                            );
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--fin card clientes-->
            </div>
        </div>
        <!-- Form End -->

    </div>
    </div>
    <!-- Container End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->

    <script src="js/main.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1000);
    </script>
</body>

</html>