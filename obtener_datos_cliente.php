<?php
require_once("control/validarusuario.php");
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location:login.php");
}
require_once('control/conexion.php');
if (isset($_GET['nombre'])) {
    $nombreCliente = $_GET['nombre'];

    $consulta = "SELECT * FROM Clientes WHERE nombre = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("s", $nombreCliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($fila = $result->fetch_assoc()) {
        // Devuelve los datos del cliente en formato JSON
        echo json_encode($fila);
    } else {
        // Si no se encuentra el cliente, devuelve un objeto JSON vacío o algún mensaje de error
        echo json_encode(array());
    }
} else {
    // Si no se proporciona el nombre, devuelve un objeto JSON vacío o algún mensaje de error
    echo json_encode(array());
}
?>
