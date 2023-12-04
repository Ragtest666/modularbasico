<?php
require_once("control/validarusuario.php");
require_once("conexion.php");

if (isset($_POST['guardar'])) {
    $id=$_POST["guardar"];
    $usuario = $_SESSION["nombre_usuario"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fechaRegistro = $_POST["fechaRegistro"];
    $fechaEntrega = $_POST["fechaEntrega"];
    $costo_total = $_POST["costo_total"];
    $productos = $_POST["agregados"];

    // Obtén el ID del trabajador
    $consultaIdTrabajador = "SELECT Trabajadores.id AS id FROM Trabajadores, Usuarios WHERE Trabajadores.id = Usuarios.id_trabajador AND Usuarios.nombre_usuario = '$usuario'";
    $resultadoIdTrabajador = mysqli_query($conexion, $consultaIdTrabajador);
    $filaIdTrabajador = mysqli_fetch_assoc($resultadoIdTrabajador);
    $idTrabajador = $filaIdTrabajador["id"];

    // Obtén el ID del cliente
    $consultaIdCliente = "SELECT id FROM Clientes WHERE nombre = '$nombre'";
    $resultadoIdCliente = mysqli_query($conexion, $consultaIdCliente);
    $filaIdCliente = mysqli_fetch_assoc($resultadoIdCliente);
    $idCliente = $filaIdCliente["id"];

   

    // Verifica si ya existe un pedido para el cliente en la fecha de realización
  
        // Construye la consulta SQL para actualizar el pedido existente
        $actualizarPedido = "UPDATE Pedidos SET productos = '$productos', descripcion_pedido = '$descripcion', fecha_entrega = '$fechaEntrega', costo_total = '$costo_total' WHERE id = '$id';";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $actualizarPedido)) {
            printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              Pedido actualizado correctamente
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar el pedido: ' . mysqli_error($conexion) . '</div>';
        }
    
       
    }

?>
