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
    <title>Inicio</title>
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
            <div class="container-fluid pt-4 px-4">
                <div class="cafeclaro rounded p-4" style="height:85vh;">

                    <div class="container-fluid pt-3 px-4 ">

                        <div class=" naranja rounded p-1 text-center ">
                            <h5 class="text-center pt-2 px-4">PEDIDOS PENDIENTES</h5>
                        </div>
                        <div class="cafeoscuro   rounded p-1  ">
                            <div class=" col-lg-6 container-fluid  pt-2 ">
                                <form class=" d-md-flex ">
                                    <input class="col-sm-12 col-lg-12 text-center searchSize search grispan border-0 rounded" type="search" id="searchInput" placeholder="Buscar un pedido">
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Sales Start -->
                    <div class="container-fluid pt-3 px-4">
                        <div class="cafeoscuro rounded h-100 p-3 w-100">

                            <div class="table-responsive rounded">
                                <form action="" method="POST">
                                    <div class="scrollBarr" style="height: 350px;">
                                        <table class="table text-start align-middle table-bordered table-hover mb-0 ">
                                            <thead class="text-center naranja text-white ">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Fecha Registro</th>
                                                    <th scope="col">Fecha Entrega</th>
                                                    <th scope="col">Folio</th>
                                                    <th scope="col">Cliente</th>
                                                    <th scope="col">Productos</th>
                                                    <th scope="col">Descripcion</th>
                                                    <th scope="col">Costo Total</th>
                                                    <th scope="col">Estatus Pedido</th>
                                                </tr>
                                            </thead>

                                            <tbody class=" CursorPointerTabla text-center">

                                                <?php
                                                require('control/conexion.php');
                                                $sql = mysqli_query($conexion, "SELECT Clientes.id AS ID,Pedidos.id AS id_pedido,fecha_realizacion,fecha_entrega,nombre,descripcion_pedido, estatus,productos,costo_total FROM Pedidos, Clientes WHERE Pedidos.id_cliente = Clientes.id AND Pedidos.estatus IN ('Pendiente', 'En proceso');");

                                                while ($fila = mysqli_fetch_array($sql)) {
                                                       if ($fila['estatus'] == "Pendiente") {
        printf(
            '<tr>
                <td>
                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal%s">Editar</button>
                </td>
                <td>%s</td>
                <td>%s</td>
                <td>%s%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>$%s</td>
                <td>
                    <div class="BtnStatus nav-item dropdown dropdown-toggle" data-bs-toggle="dropdown">
                        <label>%s</label>
                    </div>
                    <div class="dropdown-menu bg-transparent col-1 TablaStatus border-0">
                        <button type="submit" class="labeltablaProgreso dropdown-item" name="proceso" value="%s">En proceso</button>
                        <button type="submit" class="labeltablaEntregado dropdown-item" name="entregado" value="%s">Entregado</button>
                        <button type="submit" class="labeltablaCancelar dropdown-item" name="cancelado" value="%s">Cancelar</button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="exampleModal%s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Pedido</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido del formulario modal -->
                            <div class="container-fluid pt-3 px-3">
                                <div class="cafeclaro rounded p-4">
                                    <div class="naranja BarraEtiqueta pb-1 mt-2 rounded">
                                        <h5 class="pt-2 text-center">EDITAR PEDIDO</h5>
                                    </div>
                                    <!-- Form Start -->
                                    <div class="container-fluid px-4">
                                        <div class="cafeoscuro rounded h-100 p-3 pt-3 pb-1 w-100">
                                            <form class="row" method="post" name="formularioPedido">
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="mb-3">
                                                        <label for="cliente" class="Text">Nombre del cliente</label>
                                                        <select class="form-select mb-3 grispan" name="nombre" id="cliente" aria-label="Default select example" oninput="obtenerPrecios()">
                                                            <option selected>Seleccionar cliente</option>',

        $fila["id_pedido"],
        $fila["fecha_realizacion"],
        $fila["fecha_entrega"],
        $fila["ID"],
        $fila["id_pedido"],
        $fila["nombre"],
        $fila["productos"],
        $fila["descripcion_pedido"],
        $fila["costo_total"],
        $fila["estatus"],
        $fila["id_pedido"],
        $fila["id_pedido"],
        $fila["id_pedido"],
        $fila["id_pedido"],
        $fila["id_pedido"]
    );

    $nomCliente = "SELECT nombre FROM Clientes;";
    $conNom = mysqli_query($conexion, $nomCliente);
    while ($filaCliente = mysqli_fetch_array($conNom)) {
        printf(
            "<option class=\"naranja\" value=\"%s\" %s>%s</option>",
            $filaCliente["nombre"],
            ($filaCliente["nombre"] == $fila["nombre"]) ? "selected" : "",
            $filaCliente["nombre"]
        );
    }

    printf('
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label style="color: white;">Producto</label>
                                                            <select class="form-select grispan" name="producto" id="productoInput">
                                                                <option selected>Seleccionar producto</option>');

    $nomProducto = "SELECT nombre_producto FROM Productos;";
    $conNom = mysqli_query($conexion, $nomProducto);
    while ($filaProd = mysqli_fetch_array($conNom)) {
        printf('<option class="naranja" value="%s">%s</option>', $filaProd['nombre_producto'], $filaProd['nombre_producto']);
    }

    printf('
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            
                                                        <label style="color: white;">Cantidad</label>
                                                        <input class="form-control" id="cantidad" name="cantidad" type="number">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label style="color: white;">Precio</label>
                                                            <select class="form-select grispan" id="costo" name="costo" oninput="obtenerPrecios()">
                                                            <option selected>Selecciona Precio</option>
                                                            <option value="1">Mayoreo</option>
                                                            <option value="2">Menudeo</option>
                                                        </select>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label style="color: white;">Costo Total</label>
                                                            <input style="background: #9c886f;" class="form-control" readonly name="total">
                                                        </select>
                                                        </div>
                                                        <div>
                                        <button class="btn" type="button" onclick="agregarProductos()">Agregar un Producto</button>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="floatingTextarea" class="Text mt-2">Productos Agregados</label>
                                        <textarea readonly class="form-control grispan mt-2" name="agregados" placeholder="Agrega un Producto" id="floatingTextarea" style="height: 100px;background: #9c886f;">');echo htmlspecialchars($fila["productos"]); printf('</textarea>

                                    </div>
                                    <div>
                                        <button class="btn" type="button" onclick="eliminarUltimaLinea()">Eliminar un Producto</button>

                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingTextarea" class="Text mt-2">Descripción del pedido</label>
                                        <textarea class="form-control grispan mt-2" name="descripcion" placeholder="Descripción" id="floatingTextarea" style="height: 100px;">');echo htmlspecialchars($fila["descripcion_pedido"]); printf('</textarea>
                                    </div>
                                    <div class=" col-lg-6">
                                        <div class="row">
                                            <h6> Costo Total:</h6>
                                                <div class="col-lg-1">
                                                   <label class="display-4 pt-3" style="color: white;">$</label>
                                                </div>
                                                <div class="col-lg-6 " >
                                                    <input type="text" id="costo_total"  name="costo_total" readonly class="display-4 form-control-plaintext white"value="%s',$fila['costo_total']);printf('">
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
                                             <input type="date" id="fechaActual" name="fechaRegistro" value="%s" readonly>
                                         </div>
                                         <div class="col-6">
                                             <input type="date" name="fechaEntrega" value="%s" class="date col-9">
                                         </div>
                                     </div>
                                 </div>
                                                        <!-- ... (resto del formulario) -->
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <!-- Form End -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="guardar" class="btn btn-primary" value="%s" onclick="guardarCambios()">Guardar cambios</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>',
            $fila["fecha_realizacion"],
            $fila["fecha_entrega"],
            $fila["id_pedido"]
        );
    }elseif ($fila['estatus'] == "En proceso") {
                                                        printf(
                                                            '<tr class="">
                                                        <td><button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal%s">Editar</button></td>
                                                        <td>%s</td>
                                                        <td>%s</td>
                                                        <td>%s%s</td>
                                                        <td>%s</td>
                                                        <td>%s</td>
                                                        <td>%s</td>
                                                        <td>$%s</td>
                                                    <td>
                                                        <div>
                                                            <div class=" BtnStatus nav-item dropdown dropdown-toggle" data-bs-toggle="dropdown"><label>En proceso</label></div>
                                                            <div class="dropdown-menu bg-transparent col-1 TablaStatus border-0">
                                                            <button type="submit" class="labeltablaEntregado dropdown-item" name="entregado" value="%s">Entregado</button>
                                                            <button type="submit" class="labeltablaCancelar dropdown-item" name="cancelado" value="%s">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModal%s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>',
                                                            $fila["id_pedido"],
                                                            $fila["fecha_realizacion"],
                                                            $fila["fecha_entrega"],
                                                            $fila["ID"],
                                                            $fila["id_pedido"],
                                                            $fila["nombre"],
                                                            $fila["productos"],
                                                            $fila["descripcion_pedido"],
                                                            $fila["costo_total"],
                                                            $fila["id_pedido"],
                                                            $fila["id_pedido"],
                                                            $fila["id_pedido"]
                                                        );
                                                    }
                                                }
                                                ?>

                                            </tbody>


                                        </table>
                                    </div>
                                    <?php
                                    include('control/modificarestatus.php');
                                    include('control/editarpedido.php');
                                    ?>
                                </form>
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
    <script>
        $(document).ready(function() {
            // Trigger the function when the search input changes
            $('#searchInput').on('input', function() {
                var searchText = $(this).val().toLowerCase();

                // Iterate through each row in the table
                $('tbody tr').filter(function() {
                    // Check if the row contains the search text
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
                });
            });
        });
    </script>
    <script>
        var costo_total=parseFloat(document.getElementById("costo_total").value);
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
                textArea = textArea + producto + '-' + cantidad + '-' + textoCosto + '- $' + total;

            }else{
                textArea = textArea + '\n' + producto + '-' + cantidad + '-' + textoCosto + '- $' + total;
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
                window.location.href = 'index.php';
            });
        }, 1500);
    </script>
</body>

</html>