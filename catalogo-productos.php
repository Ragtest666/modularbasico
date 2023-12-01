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
    <title>Catalogo de Productos</title>
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
                            <a href="#" class="dropdown-item">Ajustes</a>
                            <a href="control/cerrar.php" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid pt-4 px-4">
                <div class="cafeclaro rounded P-4" style="height:85vh;">

                    <div class="naranja BarraEtiqueta pb-1 mt-2 rounded">
                        <h5 class=" pt-2 text-center ">CATALOGO DE PRODUCTOS</h5>
                    </div>

                    <div class="container-fluid px-4">
                        <div class="cafeoscuro rounded h-100 p-3 pt-3 pb-1 w-100">

                            <form class="row" action="#" method="post" enctype="multipart/form-data">

                                <div class="col-lg-8 col-sm-10 m-auto pd-2">
                                    <div class="row">
                                        <label for="floatingTextarea" class="Text">Nombre del producto</label>
                                        <input class="form-control mb-3" list="productosnombre" name="nombre_producto" autocomplete="off" required placeholder="Nombre del producto" id="productoInput" oninput="seleccionarProducto()">
                                        <datalist id="productosnombre">
                                            <?php
                                            $nomProducto = "SELECT nombre_producto FROM Productos;";
                                            $conNom = mysqli_query($conexion, $nomProducto);
                                            while ($fila = mysqli_fetch_array($conNom)) {
                                                printf('<option class="naranja" value="%s">%s</option>', $fila['nombre_producto'], $fila['nombre_producto']);
                                            }
                                            ?>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="floatingTextarea" class="Text">Precio menudeo</label>
                                            <input type="number" class="form-control" id="floatingInput" name="precio_menudeo" placeholder="$">
                                        </div>
                                        <div class="col">
                                            <label for="floatingTextarea" class="Text">Precio mayoreo</label>
                                            <input type="number" class="form-control" id="floatingInput" name="precio_mayoreo" placeholder="$">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="floatingTextarea" class="Text">Descripción</label>
                                            <textarea class="form-control grispan" name="descripcion" placeholder="Descripción" id="floatingTextarea" style="height: 100px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-10 pt-2 ">
                                    <div class=" text-center col-sm-12 col-lg-12 hoverbox feed-profile ">
                                        <label for="foto">
                                            <img class="bg-white img-thumbnail CursorPointerTabla shadow-sm" src="https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg" style="width: 300px; height: 230px " alt="avatar" id="img" />
                                        </label>
                                        <input class="desactiveFiles" type="file" name="imagen" id="foto" accept="image/*" />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12 mt-3">
                                    <div class=" row ">
                                        <div class="col"><button type="submit" class="btn col-sm-12 col-lg-12" name="agregar">Nuevo Producto</button></div>
                                        <div class="col"><button type="submit" class="btn col-sm-12 col-lg-12" name="agregar">Agregar Producto</button></div>
                                        <div class="col"><button type="button" class="btn col-sm-12 col-lg-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Guardar cambios</button></div>
                                        <div class="col"><button type="button" class="btn col-sm-12 col-lg-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Eliminar Producto</button></div>

                                    </div>
                                </div>
                                <script>
                                    function seleccionarProducto() {
                                        var productoSeleccionado = document.getElementById("productoInput").value;
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState == 4) {
                                                if (xhr.status == 200) {
                                                    var datosProducto = JSON.parse(xhr.responseText);
                                                    if (datosProducto !== null && datosProducto !== undefined) {
                                                        document.getElementsByName("precio_menudeo")[0].value = datosProducto.precio_menudeo || "";
                                                        document.getElementsByName("precio_mayoreo")[0].value = datosProducto.precio_mayoreo || "";
                                                        document.getElementsByName("descripcion")[0].value = datosProducto.descripcion || "";
                                                        document.getElementById("img").src = datosProducto.imagen || "https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg"; // Cambia la URL de la imagen de reemplazo si es necesario
                                                        document.getElementsByName("agregar")[0].value = datosProducto.id;
                                                        document.getElementsByName("update")[0].value = datosProducto.id;
                                                        document.getElementsByName("eliminar")[0].value = datosProducto.id;
                                                    } else {
                                                        document.getElementsByName("precio_menudeo")[0].value = "";
                                                        document.getElementsByName("precio_mayoreo")[0].value = "";
                                                        document.getElementsByName("descripcion")[0].value = "";
                                                        document.getElementById("img").src = "https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg"; // Cambia la URL de la imagen de reemplazo si es necesario
                                                        document.getElementsByName("agregar")[0].value = "";
                                                        document.getElementsByName("update")[0].value = "";
                                                        document.getElementsByName("eliminar")[0].value = "";
                                                    }
                                                } else {
                                                    console.error("Error al obtener datos del producto");
                                                }
                                            }
                                        };
                                        xhr.open("GET", "obtener_datos_productos.php?nombre_producto=" + encodeURIComponent(productoSeleccionado), true);
                                        xhr.send();
                                    }
                                </script>
                                <?php
                                include('control/agregarproducto.php');
                                include('control/editarproducto.php');
                                include('control/eliminarproducto.php');
                                ?>
                            </form>
                        </div>
                    </div>
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
        }, 1000);
    </script>
    <script src="js/main.js"></script>
    <script src="script/script.js"></script>
    <script src="script/showHide.js"></script>
</body>

</html>