<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de editar a este cliente?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" name="update">Si</button>
            </div>
        </div>
    </div>
</div>
<?php
require_once("conexion.php");

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
    
    // Verifica si se cargó una nueva imagen
    if ($_FILES["imagen"]["name"] !== "") {
        $carpeta_imagenes = "img/clientes/";
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        
        // Mueve la nueva imagen al directorio de imágenes
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

        // Actualiza la base de datos con la nueva ruta de la imagen
        $sql = "UPDATE Clientes SET
            nombre = '$nombre',
            telefono = '$telefono',
            correo = '$correo',
            direccion = '$direccion',
            colonia = '$colonia',
            tipo_local = '$tipo_local',
            codigo_postal = '$codigo_postal',
            num_interior = '$num_interior',
            num_exterior = '$num_exterior',
            imagen = '$ruta_imagen'
            WHERE id = $id";
    } else {
        // No se cargó una nueva imagen, actualiza los demás campos sin incluir la imagen
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
            WHERE id = $id";
    }

    if ($conexion->query($sql) === TRUE) {
        printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Cliente editado correctamente
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    } else {
        printf('<div class="alert alert-warning fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Cliente no se pudo editar: ' . $conexion->error . '
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    }
}
?>
