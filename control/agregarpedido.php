<?php
require_once("control/validarusuario.php");
require_once("conexion.php");

if (isset($_POST['agregar'])) {
    $usuario = $_SESSION["nombre_usuario"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fechaRegisto = $_POST["fechaRegistro"];
    $fechaEntrega=$_POST["fechaEntrega"];
    $costo_total=$_POST["costo_total"];
    

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
            $consulta_insertar_pedido = "INSERT INTO Pedidos (id_cliente, descripcion_pedido, fecha_realizacion, fecha_entrega, estatus, id_trabajador,costo_total)
                                        VALUES (?, ?, ?, ?, 'Pendiente', ?,')";
            $stmt_insertar_pedido = mysqli_prepare($conexion, $consulta_insertar_pedido);
            mysqli_stmt_bind_param($stmt_insertar_pedido, "isssi", $id_cliente, $descripcion, $fechaRegisto, $fechaRegisto, $id_trabajador,$costo_total);
            $resultado_insertar_pedido = mysqli_stmt_execute($stmt_insertar_pedido);

            if ($resultado_insertar_pedido) {
                
                    printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      Pedido agregado correctamente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                
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
