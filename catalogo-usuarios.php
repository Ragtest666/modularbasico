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
    <title>Catalogo de Usuarios</title>
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
            <div class="cafeclaro rounded p-4" >
                
            <div class="naranja BarraEtiqueta pb-1 mt-2 rounded">
                        <h5 class=" pt-2 text-center ">COLABORADOR</h5>
                 </div>
                   
                 <div class="container-fluid px-4">
                        <div class="cafeoscuro rounded h-100 p-3 pt-3 pb-1 w-100">

                            <!--Formulario star-->
                            <form class="row" action="#" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12 col-xl-6  ">
                                    <label for="nombre" class="Text">Nombre del Colaborador *</label>
                                    <input class="form-control mb-3" list="Colaboradorsnombre" name="nombre" autocomplete="off" required placeholder="" id="ColaboradorInput" oninput="seleccionarColaborador()">
                                    <datalist id="Colaboradorsnombre">
                                        <?php
                                        $nomColaborador = "SELECT nombre FROM Trabajadores;";
                                        $conNom = mysqli_query($conexion, $nomColaborador);
                                        while ($fila = mysqli_fetch_array($conNom)) {
                                            printf('<option class="naranja" value="%s">%s</option>', $fila['nombre'], $fila['nombre']);
                                        }
                                        ?>
                                    </datalist>
                                    <div class="col-sm-12 col-xl-12 row">
                                        <div class="col-sm-6 col-lg-6">
                                            <label for="telefono" class="Text"># de telefono *</label>
                                            <input class="form-control p_input mb-3" type="number" name="telefono" autocomplete="off" required placeholder="">
                                        </div>
                                        <div class="col-sm-6 col-lg-6">
                                            <label for="correo" class="Text">Correo Electrónico</label>
                                            <input class="form-control mb-3" type="email" name="correo" autocomplete="off" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-12 row">
                                        <div class="col-sm-6 col-lg-6">
                                            <label for="nss" class="Text">NSS *</label>
                                            <input class="form-control mb-3" type="number" name="nss" autocomplete="off" required placeholder="">
                                        </div>

                                        <div class="col-sm-6 col-lg-6">
                                            <label for="curp" class="Text">CURP *</label>
                                            <input class="form-control mb-3" type="text" name="curp" autocomplete="off" required placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-12  row">
                                        <div class="col-sm-6 col-xl-6 ">
                                            <label for="calle" class="Text">Calle</label>
                                            <input class="form-control mb-3" type="text" name="calle" autocomplete="off" placeholder="">
                                        </div>
                                        <div class="col-sm-6 col-xl-6 ">
                                            <label for="colonia" class="Text">Colonia</label>
                                            <input class="form-control mb-3" type="text" name="colonia" autocomplete="off" placeholder="">
                                        </div>

                                        <div class="col-sm-12 col-xl-12 row">
                                            <div class="col-sm-4 col-lg-4">
                                                <label for="codigo_postal" class="Text">C.P.</label>
                                                <input class="form-control mb-3" type="text" name="codigo_postal" autocomplete="off" placeholder="">
                                            </div>

                                            <div class="col-sm-4 col-lg-4">
                                                <label for="num_interior" class="Text pl-3 TextoExtendido">No. Int.</label>
                                                <input class="form-control mb-3" type="text" name="num_interior" autocomplete="off" placeholder="">
                                            </div>

                                            <div class="col-sm-4 col-lg-4">
                                                <label for="num_exterior" class="Text TextoExtendido">No. Ext.</label>
                                                <input class="form-control mb-3" type="text" name="num_exterior" autocomplete="off" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-xl-6 row">
                                    <div class="col-sm-12 col-xl-12 ">
                                        <label for="nombre_usuario" class="Text">Nombre de usuario *</label>
                                        <input class="form-control mb-3" type="text" name="nombre_usuario" autocomplete="off" required placeholder="">
                                    </div>
                                    <div class="col-sm-6 col-xl-6 ">
                                        <label for="contrasena" class="Text">Tipo de Usuario *</label>
                                        <input class="form-control mb-3" list="tipo_usuario" name="tipo_usuario" autocomplete="off" required placeholder="">
                                        <datalist id="tipo_usuario">
                                            <option value="Admin">Admin</option>
                                            <option value="Colaborador">Colaborador</option>
                                        </datalist>
                                    </div>
                                    <div class="col-sm-6 col-xl-6 ">
                                        <label for="confirmar_contrasena" class="Text">Contraseña *</label>
                                        <input class="form-control mb-3" type="password" name="contrasena" autocomplete="off" required placeholder="">
                                    </div>

                                    <div class="h-230 ">
                                        <div class=" text-center col-sm-12 col-lg-12 hoverbox feed-profile ">
                                            <img class=" bg-white img-thumbnail shadow-sm" src="https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg" style="width: 300px; height: 230px " alt="avatar" id="img" />
                                            <input class="desactiveFiles" type="file" name="imagen" id="foto" accept="image/*" /><label class="labell" for="foto">Seleccionar foto</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="BarraBtn rounded border col-sm-12 col-lg-12 ">
                                    <div class="row BarraBtnSeparacion">
                                    <div class="col"><button type="submit" class="btn col-sm-12 col-lg-12" name="agregar">Agregar</button></div>
                                    <div class="col"><button type="button" class="btn col-sm-12 col-lg-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Editar</button></div>
                                    <div class="col"><button type="button" class="btn col-sm-12 col-lg-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Eliminar</button></div>
                                    </div>
                                </div>
                                <?php
                                include('control/agregarusuario.php');
                                include('control/editarusuario.php');
                                include('control/eliminarusuario.php');
                                ?>
                                <script>
                                    function seleccionarColaborador() {
                                        var ColaboradorSeleccionado = document.getElementById("ColaboradorInput").value;
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                var datosColaborador = JSON.parse(xhr.responseText);
                                                document.getElementsByName("telefono")[0].value = datosColaborador.telefono;
                                                document.getElementsByName("correo")[0].value = datosColaborador.correo;
                                                document.getElementsByName("nss")[0].value = datosColaborador.nss;
                                                document.getElementsByName("curp")[0].value = datosColaborador.curp;
                                                document.getElementsByName("calle")[0].value = datosColaborador.calle;
                                                document.getElementsByName("colonia")[0].value = datosColaborador.colonia;
                                                document.getElementsByName("codigo_postal")[0].value = datosColaborador.cp;
                                                document.getElementsByName("num_interior")[0].value = datosColaborador.numero_interior;
                                                document.getElementsByName("num_exterior")[0].value = datosColaborador.numero_exterior;
                                                document.getElementsByName("nombre_usuario")[0].value = datosColaborador.nombre_usuario;
                                                document.getElementsByName("tipo_usuario")[0].value = datosColaborador.tipo_usuario;
                                                document.getElementsByName("contrasena")[0].value = datosColaborador.contrasena;
                                                document.getElementById("img").src = datosColaborador.imagen;
                                                document.getElementsByName("eliminar")[0].value = datosColaborador.id_trabajador;
                                                document.getElementsByName("update")[0].value = datosColaborador.id_trabajador;
                                            }
                                        };
                                        xhr.open("GET", "obtener_datos_colaboradores.php?nombre=" + encodeURIComponent(ColaboradorSeleccionado), true);
                                        xhr.send();
                                    }
                                </script>
                                
                            </form>
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
            }, 1000);
        </script>
        <script src="js/main.js"></script>
        <script src="script/script.js"></script>
        <script src="script/showHide.js"></script>
</body>

</html>