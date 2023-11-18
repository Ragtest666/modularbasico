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
    <title>Agregar Cliente</title>
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
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-user-edit me-2"></i>Clientes</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_cliente.php" class="dropdown-item active">Agregar cliente</a>
                            <a href="ConsultarCliente.php" class="dropdown-item">Ver Clientes</a>
                            <a href="agregar_cliente ejemplo1.php" class="dropdown-item">Editar cliente</a>
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
                    <a href="historial.php" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Historial</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-bars me-2"></i>Productos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="AgregarProducto.php" class="dropdown-item">Agregar Producto</a>
                            <a href="AgregarProducto.php" class="dropdown-item">Editar Producto</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar  rojizo navbar-dark sticky-top px-4 py-0">
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
                    <a href="index.php" class="link">Cliente</a>
                    <label class="gris">></label>
                    <a href="agregar_cliente.php" class="link">Agregar cliente</a>
                    <h5 class="pt-2 px-4">Agregar cliente</h5>
            
            <!-- Form Start -->
            <div class="container-fluid pt-2 px-4">
                <div class="cafeoscuro rounded h-100 p-4 w-100 row">
                    <div class="row">
                        <div class="col-sm-12 col-xl-6">
                            <div class="h-230">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6">
                                        <textarea class="form-control grispan" placeholder="Imagen" id="floatingTextarea" style="height: 233px;"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-xl-6">
                                        <textarea class="form-control grispan" placeholder="Agregar Imagen" id="floatingTextarea" style="height: 233px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <label for="floatingTextarea" class="Text">Dirección</label>
                            <input class="form-control mb-3" type="text" placeholder="">
                            <label for="floatingTextarea" class="Text">Colonia</label>
                            <input class="form-control mb-3" type="text" placeholder="">
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <label for="floatingTextarea" class="Text">Nombre del cliente</label>
                            <input class="form-control mb-3" type="text" placeholder="">
                            <label for="floatingTextarea" class="Text">Correo Electrónico</label>
                            <input class="form-control mb-3" type="text" placeholder="">
                            <label for="floatingTextarea" class="Text">Número de Teléfono</label>
                            <input class="form-control mb-3" type="text" placeholder="">
                            <div class="row">
                                <div class="col-sm-12 col-xl-6">
                                    <label for="floatingTextarea" class="Text">Número Exterior</label>
                                    <input class="form-control mb-3" type="text" placeholder="">
                                    <label for="floatingTextarea" class="Text">Codigo Postal</label>
                                    <input class="form-control mb-3" type="text" placeholder="">
                                </div>
                                <div class="col-sm-12 col-xl-6">
                                    <label for="floatingTextarea" class="Text">Número Interior</label>
                                    <input class="form-control mb-3" type="text" placeholder="">
                                    <label for="floatingTextarea" class="Text">Tipo Local</label>
                                    <input class="form-control mb-3" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4"><button type="submit" class="btn col-3" >Agregar Cliente</button></div>
                </div>
            <!-- Container End -->  
            </div>  
        <!-- Content End -->





                    <!-- 
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                        <div class="cafeoscuro rounded h-100 p-4 w-100">
                            <h6 class="mb-3">Datos del cliente</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Nombre del cliente</label>
                                    <input class="form-control mb-3" type="text" placeholder="Miguel Angel Patroquio Hernandez">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Dirección</label>
                                    <input class="form-control mb-3" type="text" placeholder="C. Delfín Contreras">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Número de Teléfono</label>
                                    <input class="form-control mb-3" type="text" placeholder="3226985940">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Tipo de Local</label>
                                    <input class="form-control mb-3" type="text" placeholder="Escuela">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="cafeoscuro rounded h-100 p-4 w-100">
                            <h6 class="mb-3">Pedido</h6>
                            <div>
                                <label class="Text">Producto</label>
                                <table class="table table-bordered table-hover p-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Concha</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>Cuernito</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>Telera</td>
                                            <td>7</td>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mb-2">
                                <label for="floatingTextarea"  class="Text">Descripción</label>
                                <textarea class="form-control grispan" placeholder="Poner 30 teleras en una bolsa y otras 30 en otra."
                                id="floatingTextarea" style="height: 50px;"></textarea>
                            </div>
                            <div class="pt-2">
                                <div class="row">
                                    <label class="Text col-6">Fecha Realizado</label>
                                    <label class="Text col-6">Fecha Entrega</label>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="date" class="date col-6">
                                    </div>
                                    <div class="col-6">
                                        <input type="datetime-local" class="date col-9">
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        -->
            <!-- Form End 
                </div>
            
            <div class="col-sm-12 col-xl-6">
                        <h6 class="mb-3">Datos del cliente</h6>
                        <form>
                            <div class="mb-3">
                                <label for="floatingTextarea" class="Text">Nombre del cliente</label>
                                <input class="form-control mb-3" type="text" placeholder="Miguel Angel Patroquio Hernandez">
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea" class="Text">Dirección</label>
                                <input class="form-control mb-3" type="text" placeholder="C. Delfín Contreras">
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea" class="Text">Número de Teléfono</label>
                                <input class="form-control mb-3" type="text" placeholder="3226985940">
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea" class="Text">Tipo de Local</label>
                                <input class="form-control mb-3" type="text" placeholder="Escuela">
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <h6 class="mb-3">Datos del cliente</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Nombre del cliente</label>
                                    <input class="form-control mb-3" type="text" placeholder="Miguel Angel Patroquio Hernandez">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Dirección</label>
                                    <input class="form-control mb-3" type="text" placeholder="C. Delfín Contreras">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Número de Teléfono</label>
                                    <input class="form-control mb-3" type="text" placeholder="3226985940">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Tipo de Local</label>
                                    <input class="form-control mb-3" type="text" placeholder="Escuela">
                                </div>
                            </form>
                    </div>
            -->
            
            <!-- Container End -->

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