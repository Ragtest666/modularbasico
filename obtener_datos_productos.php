<?php
require_once("control/validarusuario.php");
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location:login.php");
}
require_once('control/conexion.php');
if (isset($_GET['nombre_producto'])) {
    $nombreProducto = $_GET['nombre_producto'];

    $consulta = "SELECT * FROM Productos WHERE nombre_producto = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("s", $nombreProducto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($fila = $result->fetch_assoc()) {
        echo json_encode($fila);
    } else {
        echo json_encode(array());
    }
} else {
    echo json_encode(array());
}
?>
