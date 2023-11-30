<?php
require_once('control/conexion.php');
if (isset($_GET['nombre'])) {
    $nombreProducto = $_GET['nombre'];

    $consulta = "SELECT * FROM Trabajadores, Usuarios WHERE Trabajadores.nombre= ? AND Trabajadores.id=Usuarios.id_trabajador";
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
