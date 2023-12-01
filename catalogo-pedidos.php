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
    <title>Catalogo de Pedidos</title>
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
                    $img="SELECT imagen FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                    $imagen=mysqli_query($conexion,$img);
                    $src=mysqli_fetch_array($imagen);
                    $url=$src['imagen'];
                    echo $url;?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $usuario; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end cafeoscuro border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Ajustes</a>
                            <a href="control/cerrar.php" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid pt-4 px-4">
                <div class="row  cafeclaro rounded align-items-center justify-content-center mx-0" style="height:85vh;">
                    <div class="col-md-6  text-center">
                        <div class="container-fluid pt-2 px-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-xl-6">
                                    <div class="cafeoscuro rounded h-100 p-4 w-100">
                                        <h6 class="mb-3">Datos del cliente</h6>
                                        <form>
                                            <div class="mb-3">
                                                <label for="floatingTextarea" class="Text">Nombre del cliente</label>
                                                <select class="form-select mb-3 grispan" aria-label="Default select example">
                                                    <option selected>Seleccionar cliente</option>
                                                    <option value="1">Miguel Hernandez</option>
                                                    <option value="2">Pedro Alfonzo</option>
                                                    <option value="3">Maria del Gomez</option>
                                                </select>
                                                <div>
                                                    <button class="btn">Ver datos del cliente</button>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="floatingTextarea" class="Text">Descripción</label>
                                                <textarea class="form-control grispan" placeholder="Descripción" id="floatingTextarea" style="height: 200px;"></textarea>
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
                                                        <td>
                                                            <select class="form-select grispan">
                                                                <option selected>Seleccionar producto</option>
                                                                <option value="1">Concha</option>
                                                                <option value="2">Cuernito</option>
                                                                <option value="3">Telera</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <button class="btn">Agregar producto</button>
                                        </div>
                                        <div class="pt-4">
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
                                <div class=""><button type="submit" class="btn col-3">Agregar Pedido</button></div>
                            </div>
                        </div>
                    </div>
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
            });
        }, 3000);
        location.reload();
    </script>
    <script src="js/main.js"></script>
    <script src="script/script.js"></script>
    <script src="script/showHide.js"></script>
</body>

</html>