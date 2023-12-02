<?php
require_once("control/validarusuario.php");
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location:login.php");
}
$usuario = $_SESSION["nombre_usuario"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histrorial - Pedidos</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="img/favicon.ico" rel="icon">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <?php
        $usuario = $_SESSION['nombre_usuario'];
        require_once('control/conexion.php');
        $tipo = "SELECT tipo_usuario FROM Usuarios WHERE nombre_usuario='$usuario';";
        $nivel = mysqli_query($conexion, $tipo);
        $fila = mysqli_fetch_array($nivel);
        if ($fila['tipo_usuario'] == "Admin") {
            include('modulos/nav-admin.php');
        } elseif ($fila['tipo_usuario'] == "Colaborador") {
            include('modulos/nav-colab.php');
        }
        ?>
        <div class="content">
            <nav class="navbar navbar-expand rojizo navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none d-sm-block me-4">
                    <h2 class="text-primary mb-0"> <img src="img/Logo.png" width="200" height="80"><i class="fa "></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php
                                                                        $usuario = $_SESSION['nombre_usuario'];
                                                                        $img = "SELECT imagen FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                        $imagen = mysqli_query($conexion, $img);
                                                                        $src = mysqli_fetch_array($imagen);
                                                                        $url = $src['imagen'];
                                                                        echo $url; ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $usuario; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end cafeoscuro border-0 rounded-0 rounded-bottom m-0">
                            <a href="ajustes.php" class="dropdown-item">Ajustes</a>
                            <a href="control/cerrar.php" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Container Start -->
            <div class="container-fluid pt-3 px-3">
                <div class="cafeclaro rounded p-4">

                    <div class="container-fluid pt-3 px-4 ">
                    <!-- Barra de acceso rapido Start-->

                            <div class=" naranja rounded p-1 text-center row">
                                <h5 class="text-center pt-2 px-4">HISTORIAL DE PEDIDOS</h5>
                            </div>

                            <div class="cafeoscuro rounded p-1 row">
                       
                                <div class=" col-sm-6 container-fluid pt-2 ">
                                        <form class=" d-md-flex ">
                                            <input class="col-sm-12 col-lg-6 searchSize search grispan border-0 rounded" type="search" placeholder="Buscar un pedido">
                                        </form>
                                </div>

                                    <div class=" col-sm-6  "><a  type="submit" class=" PosicionAgregar btn text-white" aria-current="page">Filtrar</a></div>

                                

                            </div>
                        </div>
               
                    <!-- Barra de acceso rapido End -->
        
                    <!-- Recent Sales Start -->
                    <div class="container-fluid pt-3 px-4">
                        <div class="cafeoscuro text-center rounded p-4">
                            
                            <div class="table-responsive rounded">
                                    
                                <table class="table text-start align-middle table-bordered table-hover mb-0 ">
                                        <thead class="text-center naranja text-white ">
                                            <tr>
                                                <th scope="col">Fecha Registro</th>
                                                <th scope="col">Fecha Entrega</th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Productos</th>
                                                <th scope="col">Descripcion</th>
                                                <th scope="col">Costo Total</th>
                                                <th scope="col">Estatus Pedido</th>
                                            </tr>
                                        </thead>
                                        <tbody class="CursorPointerTabla text-center">
                                            <tr class="">
                                                <td>9/10/23</td>
                                                <td>10/10/23</td>
                                                <td>Alan Brito</td>
                                                <td>5 Teleras, 3 conchas</td>
                                                <td>Descripciones</td>
                                                <td>$123</td>
                                                <td>Entregado</td>
                                            </tr>
                                             <tr class="">
                                                <td>9/10/23</td>
                                                <td>10/10/23</td>
                                                <td>Alan Brito</td>
                                                <td>5 Teleras, 3 conchas</td>
                                                <td>Descripciones</td>
                                                <td>$123</td>
                                                <td>Cancelado</td>
                                            </tr>
                                             <tr class="">
                                                <td>9/10/23</td>
                                                <td>10/10/23</td>
                                                <td>Alan Brito</td>
                                                <td>5 Teleras, 3 conchas</td>
                                                <td>Descripciones</td>
                                                <td>$123</td>
                                                <td>Entregado</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <!-- Recent Sales End -->
                </div>
            </div>
        </div>
    </div>
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
                window.location.href = 'historial.php';
            });
        }, 3000);
    </script>
</body>

</html>