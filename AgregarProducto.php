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
    <title>DarkPan - Bootstrap 5 Admin Template</title>
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
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user-edit me-2"></i>Clientes</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_cliente.php" class="dropdown-item">Agregar cliente</a>
                            <a href="ConsultarCliente.php" class="dropdown-item">Ver Clientes</a>
                            <a href="#" class="dropdown-item">Editar cliente</a>
                        </div>
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
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-bars me-2"></i>Productos</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="AgregarProducto.php" class="dropdown-item">Agregar Producto</a>
                            <a href="" class="dropdown-item">Ver Producto</a>
                            <a href="" class="dropdown-item">Editar Producto</a>
                        </div>
                    </div>
                    <!--
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Pedido</a>
                    <a href="form.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Cliente</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Colaborador</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.php" class="dropdown-item">Sign In</a>
                            <a href="signup.php" class="dropdown-item">Sign Up</a>
                            <a href="404.php" class="dropdown-item">404 Error</a>
                            <a href="blank.php" class="dropdown-item">Blank Page</a>
                    -->
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
            
         <!-- container star -->
        <div class=" container-fluid pt-3 px-3">
            <div class="cafeclaro rounded p-4 "> 

            <!-- Titulo Agregar Producto star -->
                <a href="index.php" class="link">Pedido</a>
                    <label class="gris">></label>
                    <a href="agregar_pedido.php" class="link">Agregar Pedido</a>
            
           
            <!-- Titulo Datos del Producto End -->

            <!-- cabecera Datos producto star -->
                <div class="naranja rounded h-100 p-2 row">
                        <div class="col d-flex ">
                            <h6 class="text-center  mb-0">Datos del producto</h6>
                        </div>                      
                </div>
              <!-- cabecera Datos producto End -->

         <!-- Container Agregar Producto Start -->

                        <div class="cafeoscuro rounded h-100 p-4  row ">
                         <form class="col-sm-6 col-lg-8 row" method="post">
                             <div class="col-sm-12 col-lg-12  ">
                                <label for="floatingTextarea" class="Text">Nombre del producto</label>
                                <input type="text" class="form-control" id="floatingInput" placeholder="Agrega un producto">
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label for="floatingTextarea" class="Text">Precio menudeo</label>
                                <input type="number" class="form-control" id="floatingInput" placeholder="$">
                             </div>
                             <div class="col-sm-6 col-lg-6">
                                <label for="floatingTextarea" class="Text">Precio mayoreo</label>
                                <input type="number" class="form-control" id="floatingInput" placeholder="$">
                             </div>
                            <div class="col-sm-12 col-lg-12">
                                <label for="floatingTextarea"  class="Text">Descripción</label>
                                <textarea class="form-control grispan" placeholder="Descripción"
                                id="floatingTextarea" style="height: 100px;"></textarea>
                             </div>
                          </form>  
                         
                          <div class="text-center col-sm-6 col-lg-4 hoverbox feed-profile ">
                            <img class=" bg-white img-thumbnail shadow-sm" src="https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg" style="width: 240px; height: 240px " alt="avatar" id="img" />
                            <input class="desactiveFiles" type="file" name="foto" id="foto" accept="image/*" />
                            <div><label class="labell" for="foto">Seleccionar foto</label></div>
                            </div> 
                        </div>
                </div>
            </div>
            <!--Container Agregar producto End -->
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
    <script src="script/script.js"></script>
</body>

</html>