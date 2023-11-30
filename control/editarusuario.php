<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estas <strong>SEGURO</strong> de editar a este trabajador
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
    $id=$_POST['update'];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $nss = $_POST["nss"];
    $curp = $_POST["curp"];
    $calle = $_POST["calle"];
    $colonia = $_POST["colonia"];
    $cp = $_POST["codigo_postal"];
    $num_interior = $_POST["num_interior"];
    $num_exterior = $_POST["num_exterior"];
    $nombre_usuario = $_POST["nombre_usuario"];
    $tipo_usuario = $_POST["tipo_usuario"];
    $contrasena = $_POST["contrasena"];

    // Verifica si se cargó una nueva imagen
    if ($_FILES["imagen"]["name"] !== "") {
        $carpeta_imagenes = "img/colaboradores/";
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;

        // Mueve la nueva imagen al directorio de imágenes
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

        // Actualiza la base de datos con la nueva ruta de la imagen
        $sqlImagen = "UPDATE Trabajadores SET imagen = '$ruta_imagen' WHERE id = '$id';";
        $conexion->query($sqlImagen);
    }

    // Actualiza la tabla Trabajadores
    $sqlTrabajadores = "UPDATE Trabajadores SET
        telefono = '$telefono',
        correo = '$correo',
        nss = '$nss',
        curp = '$curp',
        calle = '$calle',
        colonia = '$colonia',
        cp = '$cp',
        numero_interior = '$num_interior',
        numero_exterior = '$num_exterior'
        WHERE id='$id';";

    if ($conexion->query($sqlTrabajadores) === TRUE) {
        // Actualiza la tabla Usuarios
        $sqlUsuarios = "UPDATE Usuarios SET nombre_usuario ='$nombre_usuario',
            tipo_usuario = '$tipo_usuario',
            contrasena = '$contrasena'
            WHERE id_trabajador = '$id';";

        if ($conexion->query($sqlUsuarios) === TRUE) {
            printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        Datos de trabajador y usuario actualizados correctamente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            printf('<div class="alert alert-warning fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        No se pudo actualizar la información del usuario: ' . $conexion->error . '
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }
    } else {
        printf('<div class="alert alert-warning fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    No se pudo actualizar la información del trabajador: ' . $conexion->error . '
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    }
}
?>
