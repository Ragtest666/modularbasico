<?php
require_once("conexion.php");
if (isset($_POST['agregar'])) {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $colonia = $_POST["colonia"];
    $tipo_local = $_POST["tipo_local"];
    $codigo_postal = $_POST["codigo_postal"];
    $num_interior = $_POST["num_interior"];
    $num_exterior = $_POST["num_exterior"];

    $carpeta_imagenes = "img/clientes/";

    if ($_FILES["imagen"]["name"] !== "") {
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);
    } else {
        $nombre_imagen = $conexion->insert_id . "_" . $nombre . ".jpg";
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        copy("https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg", $ruta_imagen);
    }

    $sql = "INSERT INTO Clientes (nombre, telefono, correo, direccion, colonia, tipo_local, codigo_postal, num_interior, num_exterior, imagen)
            VALUES ('$nombre', '$telefono', '$correo', '$direccion', '$colonia', '$tipo_local', '$codigo_postal', '$num_interior', '$num_exterior', '$ruta_imagen')";

    if ($conexion->query($sql) === TRUE) {
        printf('<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
       <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
       <div>
         Cliente agregado correctamente
       </div>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     ');
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
