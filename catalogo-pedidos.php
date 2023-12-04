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
            <div class="container-fluid pt-3 px-3">
                <div class="cafeclaro rounded p-4">

                    <div class="naranja BarraEtiqueta pb-1 mt-2 rounded">
                        <h5 class=" pt-2 text-center ">CATALOGO PEDIDOS</h5>
                    </div>
                    <!-- Form Start -->
                    <div class="container-fluid px-4">
                        <div class="cafeoscuro rounded h-100 p-3 pt-3 pb-1 w-100">
                            <form class="row" method="post" name="formularioPedido">
                                <div class="col-sm-12 col-xl-12">
                                    <div class="mb-3">
                                        <label for="floatingTextarea" class="Text">Nombre del cliente</label>
                                        <select class="form-select mb-3 grispan" name="nombre" aria-label="Default select example" oninput="obtenerPrecios()">
                                            <option selected>Seleccionar cliente</option>
                                            <?php
                                            $nomCliente = "SELECT nombre FROM Clientes;";
                                            $conNom = mysqli_query($conexion, $nomCliente);
                                            while ($fila = mysqli_fetch_array($conNom)) {
                                                printf('<option class="naranja" value="%s">%s</option>', $fila['nombre'], $fila['nombre']);
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div>
                                        <label class="Text">Producto</label>
                                        <table class="table table-bordered table-hover p-4">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Producto</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Costo Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="form-select grispan" name="producto" id="productoInput">
                                                            <option selected>Seleccionar producto</option>
                                                            <?php
                                                            $nomProducto = "SELECT nombre_producto FROM Productos;";
                                                            $conNom = mysqli_query($conexion, $nomProducto);
                                                            while ($fila = mysqli_fetch_array($conNom)) {
                                                                printf('<option class="naranja" value="%s">%s</option>', $fila['nombre_producto'], $fila['nombre_producto']);
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" id="cantidad" name="cantidad" type="number">
                                                    </td>
                                                    <td>
                                                        <select class="form-select grispan" id="costo" name="costo" oninput="obtenerPrecios()">
                                                            <option selected>Selecciona Precio</option>
                                                            <option value="1">Mayoreo</option>
                                                            <option value="2">Menudeo</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="total">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <button class="btn" type="button" onclick="agregarProductos()">Agregar un Producto</button>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-12">


                                    <div class="mb-3 ">
                                        <label for="floatingTextarea" class="Text mt-2">Productos Agregados</label>
                                        <textarea readonly class="form-control grispan mt-2" name="agregados" placeholder="Agrega un Producto" id="floatingTextarea" style="height: 100px;background: #9c886f;"></textarea>

                                    </div>
                                    <div>
                                        <button class="btn" type="button" onclick="eliminarUltimaLinea()">Eliminar un Producto</button>

                                    </div>

                                    <div class="mb-3">
                                        <label for="floatingTextarea" class="Text mt-2">Descripción</label>
                                        <textarea class="form-control grispan mt-2" name="descripcion" placeholder="Descripción" id="floatingTextarea" style="height: 100px;"></textarea>
                                    </div>
                                
                                               
                                   
                                            
                                    <div class=" col-lg-6">
                                        <div class="row">
                                            <h6> Costo Total:</h6>
                                                <div class="col-lg-1">
                                                   <label class="display-4" style="color: white;">$</label>
                                                </div>
                                                <div class="col-lg-6 " >
                                                    <input type="text" id="costo_total"  name="costo_total" class="display-4 form-control-plaintext white"value="">
                                                </div>

                                                </div>
                                     </div>
                                

                                    <div class="pt-4">
                                        <div class="row">
                                            <label class="Text col-6">Fecha Realizado</label>
                                            <label class="Text col-6">Fecha Entrega</label>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="date" id="fechaActual" name="fechaRegistro" value="<?php echo date('Y-m-d'); ?>" readonly>
                                            </div>
                                            <div class="col-6">
                                                <input type="date" name="fechaEntrega" class="date col-9">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="BarraBtn rounded border col-sm-12 col-lg-12 p-3 mt-3">
                                    <div class=" row ">
                                        
                                        <div class="col"><button type="submit" class="btn col-sm-12 col-lg-12" name="agregar">Agregar Pedido</button></div>
                                        

                                    </div>
                                </div>
                                             <?php
                                            include('control/agregarpedido.php');
                                            ?>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- Form End -->
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
    <script>
        var costo_total=0;
        var total=0;
        function obtenerPrecios() {
            var productoSeleccionado = document.getElementById("productoInput").value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        var datosProducto = JSON.parse(xhr.responseText);
                        if (datosProducto !== null && datosProducto !== undefined) {
                            var cantidad = document.getElementById("cantidad").value;
                            var costo = document.getElementById("costo").value;
                            var totalInput = document.getElementsByName("total")[0];

                            if (!isNaN(cantidad)) {
                                cantidad = parseFloat(cantidad);

                                if (costo == 1) {
                                    var may = parseFloat(datosProducto.precio_mayoreo);
                                    var result = cantidad * may;
                                    totalInput.value = result;
                                } else if (costo == 2) {
                                    var men = parseFloat(datosProducto.precio_menudeo);
                                    var result = cantidad * men;
                                    totalInput.value = result;
                                } else {
                        
                                }
                            } else {
                                alert('Ingresa una cantidad válida.');
                            }
                        }
                    }
                }
            };
            xhr.open("GET", "obtener_precios.php?nombre_producto=" + encodeURIComponent(productoSeleccionado), true);
            xhr.send();
        }

        function eliminarUltimaLinea() {
            var txt = document.getElementById('floatingTextarea');

            // Obtén el contenido del textarea
            var contenido = txt.value;

            // Dividir el contenido en líneas
            var lineas = contenido.split('\n');

            // Elimina la última línea
            lineas.pop();

            // Actualiza el contenido del textarea
            txt.value = lineas.join('\n');
            costo_total=parseFloat(costo_total)-parseFloat(total);
            document.getElementById('costo_total').value =costo_total;
        }
        

        function agregarProductos() {
            var producto = document.getElementById('productoInput').value;
            var cantidad = document.getElementById('cantidad').value;
            var costo = document.getElementById('costo').value;
             total = document.querySelector('[name="total"]').value;
            
            costo_total=parseFloat(costo_total)+parseFloat(total);
            var textoCosto = "";
            if (costo == 1) {
                textoCosto = "Mayoreo";
            } else if (costo == 2) {
                textoCosto = "Menudeo";
            } else {
                // Manejar otro caso si es necesario
                textoCosto = "Valor no válido";
            }

            var textArea = document.getElementById('floatingTextarea').value;
            if(textArea==""){
                textArea = textArea + producto + '-' + cantidad + '-' + textoCosto + '-' + total;

            }else{
                textArea = textArea + '\n' + producto + '-' + cantidad + '-' + textoCosto + '-' + total;
            }
           

            document.getElementById('floatingTextarea').value = textArea;


            // Referencia a la segunda tabla

            document.getElementById('costo_total').value =costo_total;

            document.getElementById('productoInput').value = "Seleccionar producto";
            document.getElementById('cantidad').value = "";
            document.getElementById('costo').value = "Selecciona Precio";
            document.querySelector('[name="total"]').value = "";
        }
    </script>
    <!-- Template Javascript -->

    <script src="js/main.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
                location.reload();
            });
        }, 3000);
    </script>
    <script src="js/main.js"></script>
    <script src="script/script.js"></script>
    <script src="script/showHide.js"></script>
</body>

</html>