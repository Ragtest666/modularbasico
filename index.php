<!DOCTYPE html>
<?php 
    require_once("control/validarusuario.php");
    if(!isset($_SESSION['nombre'])){
        header("Location:signin.php");
    }
    $usuario=$_SESSION["nombre"];
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
                <a href="index.html" class="mx-4 d-lg-block d-sm-block">
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
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-user-edit me-2"></i>Clientes</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_cliente.html" class="dropdown-item">Agregar cliente</a>
                            <a href="ConsultarCliente.html" class="dropdown-item ">Ver Clientes</a>
                            <a href="#" class="dropdown-item">Editar cliente</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>Pedidos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_pedido.html" class="dropdown-item active">Agregar pedido</a>
                            <a href="consultar_pedido.html" class="dropdown-item">Consultar pedido</a>
                            <a href="editar_pedido.html" class="dropdown-item">Editar Pedido</a>
                        </div>
                    </div>
                    <a href="historial.html" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Historial</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="fa fa-bars me-2"></i>Productos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="AgregarProducto.html" class="dropdown-item">Agregar Producto</a>
                            <a href="" class="dropdown-item">Ver Producto</a>
                            <a href="" class="dropdown-item">Editar Producto</a>
                        </div>
                    </div>
                    <!--
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Pedido</a>
                    <a href="form.html" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Cliente</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Colaborador</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                    -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand rojizo navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none d-sm-block me-4">
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

                <a href="index.html" class="link">Pedido</a>
                    <label class="gris">></label>
                    <a href="agregar_pedido.html" class="link">Agregar Pedido</a>
            
           
            <!-- Titulo Datos del Producto End -->

         <!-- Container Agregar Pedido Start -->

            <div class="container-fluid pt-3 px-4 py-3 ">
                <div class="cafeoscuro text-center rounded p-1 row ">
                    <div class="align-items-center justify-content-between mb-2">
                        <h6 class="mb-0 my-2">Acceso Rapido</h6>
                    </div>    
                        <div class="col-4 p-0  "><button type="submit"  href="#" class="btn Botonn text-white btn btn-primary  m-2" aria-current="page" >Editar</button></div>
                        <div class="col-4 p-0  "><button type="submit"  href="#" class="btn Botonn text-white btn btn-primary  m-2" aria-current="page" >Agregar</button></div>
                        <div class="col-4 p-0  "><button type="submit"  href="#" class="btn Botonn text-white btn btn-primary  m-2" aria-current="page" >Eliminar</button></div>
                </div>
             </div>

                  <!-- cabecera Datos producto star -->

                     <div class="naranja rounded h-100 p-2 row">
                            <div class="col d-flex ">
                                <h5 class="text-center  mb-0">Clientes</h5>
                            </div>                      
                    </div>
                    
                  <!-- cabecera Datos producto End -->

              <div class="cafeoscuro rounded h-100 p-4  row ">
                <div class=" text-center rounded p-4 row  ">
                    
                        <!--card de clientes-->
                        <div class="card-body px-1 py-0  ">
                            <div class="row g-0 text-center fs--1">

                                <div class="col-6  col-md-4 col-lg-3 col-xxl-2 mb-1">
                                    <div class="con p-3 h-100"><a href="ConsultarCliente.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 bordercolor shadow-sm" src="img/Pugberto3.jpg" alt="" width="150" /></a>
                                    <h6 class=" mb-1"><a class="fuente" class="fuente" href="../../pages/user/profile.html">Licenciado Pugberto</a></h6>
                                    <p class=" fs--2 mb-1"><a class="fuente" href="#!">Tel: 322-356-5423</a></p>
                                    </div>
                                </div>

                                <div class="col-6  col-md-4 col-lg-3 col-xxl-2 mb-1">
                                    <div class="con p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 bordercolor shadow-sm" src="img/Pugberto3.jpg" alt="" width="150" /></a>
                                    <h6 class="mb-1"><a class="fuente" href="../../pages/user/profile.html">Licenciado Pugberto</a></h6>
                                    <p class="fs--2 mb-1"><a class="fuente" href="#!">Tel: 322-356-5423</a></p>
                                    </div>
                                </div>

                                <div class="col-6  col-md-4 col-lg-3 col-xxl-2 mb-1">
                                    <div class="con p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 bordercolor shadow-sm" src="img/Pugberto3.jpg" alt="" width="150" /></a>
                                    <h6 class="mb-1"><a class="fuente" href="../../pages/user/profile.html">Licenciado Pugberto</a></h6>
                                    <p class="fs--2 mb-1"><a class="fuente" href="#!">Tel: 322-356-5423</a></p>
                                    </div>
                                </div>

                                <div class="col-6  col-md-4 col-lg-3 col-xxl-2 mb-1">
                                    <div class="con  p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 bordercolor shadow-sm" src="img/Pugberto3.jpg" alt="" width="150" /></a>
                                    <h6 class="mb-1"><a class="fuente" href="../../pages/user/profile.html">Licenciado Pugberto</a></h6>
                                    <p class="fs--2 mb-1"><a class="fuente" href="#!">Tel: 322-356-5423</a></p>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1 ">
                                    <div class="con p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 bordercolor shadow-sm" src="img/Pugberto3.jpg" alt="" width="150" /></a>
                                    <h6 class="mb-1"><a class="fuente" href="../../pages/user/profile.html">Kit Harington</a></h6>
                                    <p class="fs--2 mb-1"><a class="fuente" href="#!">Harvard Korea Society</a></p>
                                    </div>
                                </div>
                            </div>
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
</body>

</html>