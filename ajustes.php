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
    <title>Ajuste - Perfil</title>
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
                            <span class="d-none d-lg-inline-flex" id="colaboradorajustes" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT nombre FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['nombre']; ?>"><?php echo $usuario; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end cafeoscuro border-0 rounded-0 rounded-bottom m-0">
                            <a href="ajustes.php" class="dropdown-item">Ajustes</a>
                            <a href="control/cerrar.php" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid pt-3 px-3">
                <div class="cafeclaro rounded p-4">


                    <div class="naranja BarraEtiqueta pb-1 mt-2 rounded   ">
                        <h5 class=" pt-2 text-center ">AJUSTES</h5>
                    </div>

                    <!-- Form Start -->
                    <div class="container-fluid  px-4">
                        <div class="cafeoscuro rounded h-100 p-3 pt-3 w-100 ">

                            <!--Formulario star-->

                            <form class="row" action="" method="post" enctype="multipart/form-data">


                                <div class="col-sm-12 col-xl-6  ">



                                    <div class="col-sm-12 col-lg-12  row">

                                        <div class="col-sm-6 col-lg-6">
                                            <label for="floatingTextarea" class="Text">Numero de telefono *</label>
                                            <input class="form-control p_input mb-3" type="text" name="telefono" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT telefono FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['telefono']; ?>"autocomplete="off" required placeholder="">

                                        </div>

                                        <div class="col-sm-6 col-lg-6">
                                            <label for="floatingTextarea" class="Text">Correo Electrónico *</label>
                                            <input class="form-control mb-3" type="email" name="correo"  autocomplete="off"  required placeholder="">
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-xl-12  row">

                                        <div class="col-sm-6 col-xl-6 ">
                                            <label for="floatingTextarea" class="Text">Calle *</label>
                                            <input class="form-control mb-3" type="text" name="calle" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT calle FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['calle']; ?>"autocomplete="off" required placeholder="">
                                        </div>

                                        <div class="col-sm-6 col-xl-6 ">
                                            <label for="floatingTextarea" class="Text">Colonia *</label>
                                            <input class="form-control mb-3" type="text" name="colonia" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT colonia FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['colonia']; ?>"autocomplete="off" required placeholder="">
                                        </div>
                                    </div>

                                    <div class=" col-sm-12 col-xl-12 row">
                                        <div class="col-sm-4 col-lg-4">
                                            <label for="floatingTextarea" class="Text">C.P. *</label>
                                            <input class="form-control mb-3" type="text" name="codigo_postal" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT cp FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['cp']; ?>" autocomplete="off" required placeholder="">
                                        </div>

                                        <div class="col-sm-4 col-lg-4">
                                            <label for="floatingTextarea" class="Text pl-3  TextoExtendido">No. Int. *</label>
                                            <input class="form-control mb-3" type="text" name="num_interior" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT numero_interior FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['numero_interior']; ?>" autocomplete="off" required placeholder="">
                                        </div>

                                        <div class="col-sm-4 col-lg-4">
                                            <label for="floatingTextarea" class="Text TextoExtendido">No. Ext. *</label>
                                            <input class="form-control  mb-3" type="text" name="num_exterior" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT numero_exterior FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['numero_exterior']; ?>" autocomplete="off" required placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-12 row">
                                        <div class="col-sm-12 col-xl-6 ">
                                            <label for="floatingTextarea" class="Text">Nombre de usuario *</label>
                                            <input class="form-control mb-3" type="text" name="nombre_usuario" value="<?php echo $usuario; ?>" autocomplete="off" required placeholder="">
                                        </div>

                                        <div class="col-sm-12 col-xl-5  ">
                                            <label for="floatingTextarea" class="Text">Contraseña *</label>
                                            <input type="password" id="txtPassword" name="contrasena" autocomplete="off" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT contrasena FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['contrasena']; ?>"class="form-control" />
                                        </div>

                                        <div class="col-lg-1 PadPassword">
                                            <span id="imgContrasena" data-activo=false class="BtnShow rounded">(ó)</span>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-sm-12 col-xl-6 ">
                                    <div class="text-center col-sm-12 col-lg-12 pt-4 hoverbox feed-profile" aling="center">
                                        <label for="foto">
                                            <img class="bg-white img-thumbnail CursorPunto shadow-sm" src="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT imagen FROM Trabajadores, Usuarios WHERE Trabajadores.id=Usuarios.id_trabajador AND Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['imagen']; ?>" style="width: 300px; height: 250px " alt="avatar" id="img" />
                                        </label>
                                        <input class="desactiveFiles" type="file" name="foto" id="foto" accept="image/*" />
                                    </div>
                                </div>



                                <div class="BarraBtn rounded p-2 text-center mt-2">
                                    <button type="submit" class="btn col-sm-16 col-lg-6" value="<?php $usuario = $_SESSION['nombre_usuario'];
                                                                                                    $nombreColab = "SELECT id_trabajador FROM  Usuarios WHERE  Usuarios.nombre_usuario='$usuario';";
                                                                                                    $nom = mysqli_query($conexion, $nombreColab);
                                                                                                    $fila = mysqli_fetch_array($nom);
                                                                                                    echo $fila['id_trabajador'];?>"name="update">Guardar cambios</button>
                                </div>
                                <?php
                                include('control/editarcolaboradorajustes.php');
                                ?>
                            </form>

                        </div>
                    </div>

                    <!--Formulario end-->
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
                window.location.href = 'ajustes.php';
            });
        }, 3000);
    </script>
    <script src="script/show.js"></script>
    <script src="js/main.js"></script>
    <script src="script/script.js"></script>
    <script src="script/showHide.js"></script>
</body>

</html>