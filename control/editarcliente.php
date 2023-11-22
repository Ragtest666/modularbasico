<?php
if (isset($_POST['update'])) {
    $id = $_POST["update"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $colonia = $_POST["colonia"];
    $tipo_local = $_POST["tipo_local"];
    $codigo_postal = $_POST["codigo_postal"];
    $num_interior = $_POST["num_interior"];
    $num_exterior = $_POST["num_exterior"];

    if ($_FILES["imagen"]["name"] !== "") {
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);
    }

    $sql = "UPDATE Clientes SET
            nombre = '$nombre',
            telefono = '$telefono',
            correo = '$correo',
            direccion = '$direccion',
            colonia = '$colonia',
            tipo_local = '$tipo_local',
            codigo_postal = '$codigo_postal',
            num_interior = '$num_interior',
            num_exterior = '$num_exterior'
            imagen='$ruta_imagen'
            WHERE id_cliente = $id";


    if ($conexion->query($sql) === TRUE) {

        printf('<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Cliente editado correctamente
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    } else {
        printf('<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Cliente no se pudo editar
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    }
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error;
}
