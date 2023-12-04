<?php
require_once("control/validarusuario.php");
require_once("conexion.php");

if (isset($_POST['agregar'])) {
    $usuario = $_SESSION["nombre_usuario"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fechaRegisto = $_POST["fechaRegistro"];
    $fechaEntrega=$_POST["fechaEntrega"];
    

    // Obtener el ID del trabajador
    $consulta_trabajador = "SELECT Usuarios.id_trabajador 
                           FROM Trabajadores
                           JOIN Usuarios ON Trabajadores.id = Usuarios.id_trabajador 
                           WHERE Usuarios.nombre_usuario = ?";
    $stmt_trabajador = mysqli_prepare($conexion, $consulta_trabajador);
    mysqli_stmt_bind_param($stmt_trabajador, "s", $usuario);
    mysqli_stmt_execute($stmt_trabajador);
    $resultado_trabajador = mysqli_stmt_get_result($stmt_trabajador);

    if ($fila_trabajador = mysqli_fetch_array($resultado_trabajador)) {
        $id_trabajador = $fila_trabajador["id_trabajador"];

        // Obtener el ID del cliente
        $consulta_cliente = "SELECT id FROM Clientes WHERE nombre = ?";
        $stmt_cliente = mysqli_prepare($conexion, $consulta_cliente);
        mysqli_stmt_bind_param($stmt_cliente, "s", $nombre);
        mysqli_stmt_execute($stmt_cliente);
        $resultado_cliente = mysqli_stmt_get_result($stmt_cliente);

        if ($fila_cliente = mysqli_fetch_array($resultado_cliente)) {
            $id_cliente = $fila_cliente["id"];
            mysqli_stmt_close($stmt_cliente);

            // Insertar pedido
            $consulta_insertar_pedido = "INSERT INTO Pedidos (id_cliente, descripcion_pedido, fecha_realizacion, fecha_entrega, estatus, id_trabajador)
                                        VALUES (?, ?, ?, ?, 'Pendiente', ?)";
            $stmt_insertar_pedido = mysqli_prepare($conexion, $consulta_insertar_pedido);
            mysqli_stmt_bind_param($stmt_insertar_pedido, "isssi", $id_cliente, $descripcion, $fechaRegisto, $fechaRegisto, $id_trabajador);
            $resultado_insertar_pedido = mysqli_stmt_execute($stmt_insertar_pedido);

            if ($resultado_insertar_pedido) {
                $id_pedido = mysqli_insert_id($conexion);
                $productos = json_decode($_POST['productos'], true);

                // Realizar el insert en la tabla de tickets
                // Aquí debes adaptar la lógica según la estructura de tu base de datos
                // Además, asegúrate de sanitizar y validar los datos antes de utilizarlos en la consulta SQL
            
                // Ejemplo básico:
                foreach ($productos as $producto) {
                    $nombre_producto = $producto['producto'];
                    $cantidad = $producto['cantidad'];
                    $precio = $producto['precio'];
                    $costoTotal = $producto['costoTotal'];

                    // Insertar ticket
                    $consulta_insertar_ticket = "INSERT INTO Tickets (id_pedidos, producto, cantidad, costo, total)
                                                VALUES (?, ?, ?, ?, ?)";
                    $stmt_insertar_ticket = mysqli_prepare($conexion, $consulta_insertar_ticket);
                    mysqli_stmt_bind_param($stmt_insertar_ticket, "isidd", $id_pedido, $nombre_producto, $cantidad, $precio, $total);
                    $resultado_insertar_ticket = mysqli_stmt_execute($stmt_insertar_ticket);

                    if (!$resultado_insertar_ticket) {
                        echo "Error al insertar ticket: " . mysqli_error($conexion);
                    }
                }

                if ($resultado_insertar_ticket) {
                    printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      Pedido agregado correctamente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                } else {
                    // Manejar error en la inserción del ticket
                }

                mysqli_stmt_close($stmt_insertar_ticket);
            } else {
                echo "Error al insertar pedido: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al obtener ID del cliente: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al obtener ID del trabajador: " . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt_trabajador);
}
?>
