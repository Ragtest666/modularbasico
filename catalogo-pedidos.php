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
                                        <button class="btn" type="button" onclick="agregarProductos()">Agregar producto</button>
                                    </div>
                                </div>

                                <script>
                                    function agregarProductos() {
                                        // Captura de valores de la primera tabla
                                        var producto = document.getElementById('productoInput').value;
                                        var cantidad = document.getElementById('cantidad').value;
                                        var costo = document.getElementById('costo').value;
                                        var total = document.querySelector('[name="total"]').value;

                                        // Referencia a la segunda tabla
                                        var tablaProductos = document.getElementById('tablaProductos');

                                        // Crear un identificador único para cada fila
                                        var filaId = 'fila_' + Date.now(); // Utilizamos la marca de tiempo para obtener un identificador único

                                        // Crear nueva fila con los valores capturados y asignarle el identificador único
                                        var newRow = tablaProductos.insertRow(-1); // -1 inserta la fila al final de la tabla
                                        newRow.id = filaId;

                                        // Crea celdas y agrega los valores
                                        var checkCell = newRow.insertCell(0);
                                        var checkbox = document.createElement('input');
                                        checkbox.type = 'checkbox';
                                        checkbox.className = 'form-check-input';
                                        checkCell.appendChild(checkbox);

                                        var productoCell = newRow.insertCell(1);
                                        productoCell.textContent = producto;

                                        var cantidadCell = newRow.insertCell(2);
                                        cantidadCell.textContent = cantidad;

                                        var costoCell = newRow.insertCell(3);
                                        costoCell.textContent = (costo == 1) ? 'Mayoreo' : (costo == 2) ? 'Menudeo' : 'Otro';

                                        var totalCell = newRow.insertCell(4);
                                        totalCell.textContent = total;

                                        document.getElementById('productoInput').value = "Seleccionar producto";
                                        document.getElementById('cantidad').value = "";
                                        document.getElementById('costo').value = "Selecciona Precio";
                                        document.querySelector('[name="total"]').value = "";
                                    }
                                </script>
                                <script>
                                    function eliminarProductos() {
                                        // Referencia a la segunda tabla
                                        var tablaProductos = document.getElementById('tablaProductos');

                                        // Obtener todas las filas de la tabla
                                        var filas = tablaProductos.rows;

                                        // Recorrer las filas desde la última hacia la primera (excluyendo el encabezado)
                                        for (var i = filas.length - 1; i > 0; i--) {
                                            var fila = filas[i];

                                            // Obtener el checkbox de la primera celda
                                            var checkbox = fila.cells[0].querySelector('.form-check-input');

                                            // Verificar si el checkbox está marcado
                                            if (checkbox.checked) {
                                                // Eliminar la fila si el checkbox está marcado
                                                tablaProductos.deleteRow(i);
                                            }
                                        }
                                    }
                                </script>
                                <script>
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
                                                                alert('Selecciona un costo válido (1 para Mayoreo, 2 para Menudeo).');
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
                                </script>
                        </div>


                        <div class="col-sm-12 col-xl-12">
                            <div class="">

                                <div class="mb-3 ">
                                    <label for="floatingTextarea" class="Text">Productos Agregados</label>
                                    <div class="scrollBarr">
                                        <table class="table  table-bordered table-hover p-4 scrollBarr" id="tablaProductos" name="tablaProductos" style="height: 55px;">
                                            <thead class="ssss" style="border-top: 1px;">
                                                <tr class="">
                                                    <th scope="col"><input class="form-check-input" type="checkbox" onclick="toggleCheckAll()"></th>
                                                    <th class="" scope="col">Producto</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Costo Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                <tr>
                                                    <td>Dato 1-1</td>
                                                    <td>Dato 1-2</td>
                                                    <td>Dato 1-3</td>
                                                    <td>Dato 1-4</td>
                                                    <td>Dato 1-5</td>
                                                </tr>
                                                <tr>
                                                    <td>Dato 2-1</td>
                                                    <td>Dato 2-2</td>
                                                    <td>Dato 2-3</td>
                                                    <td>Dato 2-4</td>
                                                    <td>Dato 2-5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <script>
                                            function toggleCheckAll() {
                                                // Referencia a la segunda tabla
                                                var tablaProductos = document.getElementById('tablaProductos');

                                                // Obtener el checkbox del encabezado
                                                var checkboxEncabezado = tablaProductos.querySelector('thead input[type="checkbox"]');

                                                // Obtener todas las filas de la tabla
                                                var filas = tablaProductos.rows;

                                                // Obtener el estado actual del checkbox del encabezado
                                                var isChecked = checkboxEncabezado.checked;

                                                // Iterar sobre las filas y actualizar los checkboxes
                                                for (var i = 0; i < filas.length; i++) {
                                                    var checkbox = filas[i].cells[0].querySelector('.form-check-input');

                                                    // Marcar o desmarcar el checkbox según el estado actual del checkbox del encabezado
                                                    checkbox.checked = isChecked;
                                                }
                                            }

                                            function enviarPedido() {
                                                // Obtén la referencia de la tabla
                                                var tablaProductos = document.getElementById('tablaProductos');

                                                // Obtén todas las filas de la tabla, excluyendo la primera que es el encabezado
                                                var filas = Array.from(tablaProductos.getElementsByTagName('tr')).slice(1);

                                                // Crea un array para almacenar los datos de cada fila
                                                var datos = [];

                                                // Recorre las filas y obtén los datos de cada celda
                                                filas.forEach(function(fila) {
                                                    var celdas = fila.getElementsByTagName('td');
                                                    var datosFila = Array.from(celdas).map(function(celda) {
                                                        return celda.textContent.trim(); // Puedes ajustar según tu estructura HTML
                                                    });
                                                    datos.push(datosFila);
                                                });

                                                // Realiza la solicitud AJAX al script PHP
                                                var xhr = new XMLHttpRequest();
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState == 4) {
                                                        if (xhr.status == 200) {
                                                            // Manejar la respuesta del servidor si es necesario
                                                            console.log(xhr.responseText);
                                                        } else {
                                                            console.error("Error al realizar la solicitud AJAX. Estado:", xhr.status);
                                                            console.error("Respuesta del servidor:", xhr.responseText); // Agregamos esta línea para obtener más detalles sobre el error
                                                        }
                                                    }
                                                };

                                                // Configura la solicitud
                                                var url = "control/prueba.php";
                                                xhr.open("POST", url, true);
                                                xhr.setRequestHeader("Content-Type", "application/json");

                                                // Convierte los datos a formato JSON y envíalos
                                                var datosJSON = JSON.stringify({
                                                    filas: datos
                                                });
                                                xhr.send(datosJSON);
                                            }
                                        </script>


                                    </div>
                                    <div>
                                        <button class="btn" type="button" onclick="eliminarProductos()">Eliminar Producto</button>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="floatingTextarea" class="Text">Descripción</label>
                                    <textarea class="form-control grispan" name="descripcion" placeholder="Descripción" id="floatingTextarea" style="height: 100px;"></textarea>
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
                                <div class="col"><button type="submit" class="btn col-sm-12 col-lg-12" name="nuevo">Nuevo Pedido</button></div>
                                <div class="col"><button type="submit" class="btn col-sm-12 col-lg-12" name="agregar" onclick="enviarPedido()">Agregar Pedido</button></div>
                                <div class="col"><button type="button" class="btn col-sm-12 col-lg-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Guardar Cambios</button></div>
                                <div class="col"><button type="button" class="btn col-sm-12 col-lg-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Eliminar Pedido</button></div>

                            </div>
                        </div>

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