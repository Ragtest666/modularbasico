<?php
require_once("conexion.php");

if (isset($_POST['agregar'])) {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $calle = $_POST["calle"];
    $colonia = $_POST["colonia"];
    $codigo_postal = $_POST["codigo_postal"];
    $num_interior = $_POST["num_interior"];
    $num_exterior = $_POST["num_exterior"];

    // Datos de Trabajador
    $nss = $_POST["nss"];
    $calle = $_POST["calle"];
    $curp = $_POST["curp"];

    // Datos de Usuario
    $tipo_usuario = $_POST["tipo_usuario"];
    $nombre_usuario=$_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"]; // Contraseña sin cifrar

    $carpeta_imagenes = "img/colaboradores/";

    if ($_FILES["imagen"]["name"] !== "") {
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);
    } else {
        $nombre_imagen = $conexion->insert_id . "_" . $nombre . ".jpg";
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        copy("https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg", $ruta_imagen);
    }

    // Insertar en la tabla Trabajadores
    $sqlTrabajador = "INSERT INTO Trabajadores (nombre, telefono, correo, nss, calle, colonia, cp, numero_interior, numero_exterior, curp,imagen)
                    VALUES ('$nombre', '$telefono', '$correo', '$nss', '$calle', '$colonia', '$codigo_postal', '$num_interior', '$num_exterior', '$curp','$ruta_imagen')";

    // Verificar si la inserción en la tabla Trabajadores fue exitosa
    if ($conexion->query($sqlTrabajador) === TRUE) {
        $id_trabajador = $conexion->insert_id;

        // Insertar en la tabla Usuarios
        $sqlUsuario = "INSERT INTO Usuarios (tipo_usuario, nombre_usuario, correo, contrasena, id_trabajador)
                    VALUES ('$tipo_usuario', '$nombre_usuario', '$correo', '$contrasena', $id_trabajador)";

        // Verificar si la inserción en la tabla Usuarios fue exitosa
        if ($conexion->query($sqlUsuario) === TRUE) {
            printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        Trabajador y Usuario agregados correctamente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            echo "Error al agregar en la tabla Usuarios: " . $conexion->error;
        }
    } else {
        echo "Error al agregar en la tabla Trabajadores: " . $conexion->error;
    }
}
?>
