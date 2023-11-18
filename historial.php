<!DOCTYPE html>
<?php 
    require_once("control/validarusuario.php");
    if(!isset($_SESSION['nombre'])){
        header("Location:signin.php");
    }
    $usuario=$_SESSION["nombre"];
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Historial</title>
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
        <div id="spinner" class="show cafeclaro position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar naranja navbar-dark">
                <a href="index.php" class="mx-4 d-lg-block d-sm-block">
                    <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-2">
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
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user-edit me-2"></i>Clientes</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_cliente.php" class="dropdown-item">Agregar cliente</a>
                            <a href="ConsultarCliente.php" class="dropdown-item">Ver Clientes</a>
                            <a href="#" class="dropdown-item">Editar cliente</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>Pedidos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_pedido.php" class="dropdown-item">Agregar pedido</a>
                            <a href="consultar_pedido.php" class="dropdown-item">Consultar pedido</a>
                            <a href="editar_pedido.php" class="dropdown-item">Editar Pedido</a>
                        </div>
                    </div>
                    <a href="historial.php" class="nav-item nav-link active"><i class="fa fa-file-alt me-2"></i>Historial</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-bars me-2"></i>Productos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="" class="dropdown-item">Agregar Producto</a>
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
                            <a href="#" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Container Start -->
            <div class="container-fluid pt-3 px-3">
                <div class="cafeclaro rounded p-4">
                    <a href="index.php" class="link">Pedido</a>
                    <label class="gris">></label>
                    <a href="historial.php" class="link">Historial de Pedidos</a>
                    <h5 class="pt-2 px-4">Historial de Pedidos</h5>
                    
                    <!-- Search Bar Start-->
                    <div class="container-fluid mb-1 pt-2 px-2">
                        <div class="col-3">
                            <form class="d-none d-md-flex ms-4">
                                <input class="search grispan border-0 rounded" type="search" placeholder="Buscar">
                            </form>
                        </div>
                    </div>
                    <!-- Search Bar End-->
        
                    <!-- Barra de acceso rapido Start-->
                    <div class="container-fluid px-3">
                        <div class="container-fluid pt-3 px-4 ">
                            <div class="cafeoscuro text-center rounded p-1 row ">
                                <div class="align-items-center justify-content-between mb-2">
                                    <h6 class="mb-0 my-2">Acceso Rapido</h6>
                                </div>    
                                    <div class="col-4 p-0"><button type="submit"  href="#" class="btn text-white btn w-50 m-2" aria-current="page" >Agregar</button></div>
                                    <div class="col-4 p-0"><button type="submit"  href="#" class="btn text-white btn w-50 m-2" aria-current="page" >Eliminar</button></div>
                                    <div class="col-4 p-0"><button type="submit"  href="#" class="btn text-white btn w-50 m-2" aria-current="page" >Filtrar</button></div>
                            </div>
                        </div>
                    </div>
                    <!-- Barra de acceso rapido End -->
        
                    <!-- Recent Sales Start -->
                    <div class="container-fluid pt-3 px-4">
                        <div class="cafeoscuro text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-left mb-4">
                                <h6 class="mb-0">Pagina</h6>
                                <a href="#" class="link2 px-1">1</a>
                                <h6 class="mb-0">de</h6>
                                <a href="#" class="link2 px-1">50</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-bordered table-hover mb-0">
                                    <thead>
                                        <tr class="text-white">
                                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                            <th scope="col">Fecha Realizada</th>
                                            <th scope="col">Fecha Entrega</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Productos</th>
                                            <th scope="col">Costo Total</th>
                                            <th scope="col">Observaciones</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td>9/10/23</td>
                                            <td>10/10/23</td>
                                            <td>Alan Brito</td>
                                            <td>5 Teleras, 3 conchas</td>
                                            <td>$123</td>
                                            <td>Observaciones</td>
                                            <td>Listo</td>
                                            <td><a class="btn" href="">Consultar</a></td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td>9/10/23</td>
                                            <td>10/10/23</td>
                                            <td>Paul Diestro</td>
                                            <td>5 conchas, 1 bolillo</td>
                                            <td>$61</td>
                                            <td>Observaciones</td>
                                            <td>Listo</td>
                                            <td><a class="btn" href="">Consultar</a></td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td>9/10/23</td>
                                            <td>10/10/23</td>
                                            <td>Soyla Mesa</td>
                                            <td>7 Teleras, 8 donas</td>
                                            <td>$246</td>
                                            <td>Observaciones</td>
                                            <td>Listo</td>
                                            <td><a class="btn" href="">Consultar</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Recent Sales End -->
                </div>
            </div>
            
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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