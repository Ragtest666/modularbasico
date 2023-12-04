<?php
require_once("control/validarusuario.php");
require_once("conexion.php");

if (isset($_POST['agregar'])) {
    $usuario = $_SESSION["nombre_usuario"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fechaRegistro = $_POST["fechaRegistro"];
    $fechaEntrega = $_POST["fechaEntrega"];
    $costo_total = $_POST["costo_total"];
    $productos = $_POST["agregados"];
    
    // Obtén el ID del trabajador
    $consultaIdTrabajador = "SELECT Trabajadores.id AS id FROM Trabajadores, Usuarios WHERE Trabajadores.id= Usuarios.id_trabajador AND Usuarios.nombre_usuario = '$usuario'";
    $resultadoIdTrabajador = mysqli_query($conexion, $consultaIdTrabajador);
    $filaIdTrabajador = mysqli_fetch_assoc($resultadoIdTrabajador);
    $idTrabajador = $filaIdTrabajador["id"];

    $consultaIdCliente = "SELECT id FROM Clientes WHERE nombre = '$nombre'";
$resultadoIdCliente = mysqli_query($conexion, $consultaIdCliente);
$filaIdCliente = mysqli_fetch_assoc($resultadoIdCliente);
$idCliente = $filaIdCliente["id"];
    
    // Construye la consulta SQL para insertar en la tabla Pedidos
    $insertarPedido = "INSERT INTO Pedidos (id_cliente, productos, descripcion_pedido, fecha_realizacion, fecha_entrega, estatus, id_trabajador, costo_total)
                                    VALUES ('$idCliente', '$productos', '$descripcion', '$fechaRegistro', '$fechaEntrega', 'Pendiente', '$idTrabajador', '$costo_total');";
    
    // Ejecutar la consulta
    if (mysqli_query($conexion, $insertarPedido)) {
        printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Pedido agregado correctamente
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al agregar el pedido: ' . mysqli_error($conexion) . '</div>';
    }
}
    ?>
    
