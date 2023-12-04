<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmar Edición de Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de editar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" name="update">Sí</button>
            </div>
        </div>
    </div>
</div>

<?php
require_once("conexion.php");

if (isset($_POST['update'])) {
    $id = $_POST["update"];
    $nombre_producto = $_POST["nombre_producto"];
    $precio_menudeo = $_POST["precio_menudeo"];
    $precio_mayoreo = $_POST["precio_mayoreo"];
    $descripcion = $_POST["descripcion"];
    
    // Verifica si se cargó una nueva imagen
    if ($_FILES["imagen"]["name"] !== "") {
        $carpeta_imagenes = "img/productos/";
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        
        // Mueve la nueva imagen al directorio de imágenes
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

        // Actualiza la base de datos con la nueva ruta de la imagen
        $sql = "UPDATE Productos SET
            nombre_producto = '$nombre_producto',
            precio_menudeo = $precio_menudeo,
            precio_mayoreo = $precio_mayoreo,
            descripcion = '$descripcion',
            imagen = '$ruta_imagen'
            WHERE id = $id";
    } else {
        // No se cargó una nueva imagen, actualiza los demás campos sin incluir la imagen
        $sql = "UPDATE Productos SET
            nombre_producto = '$nombre_producto',
            precio_menudeo = $precio_menudeo,
            precio_mayoreo = $precio_mayoreo,
            descripcion = '$descripcion'
            WHERE id = $id";
    }

    if ($conexion->query($sql) === TRUE) {
        printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Producto editado correctamente
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    } else {
        printf('<div class="alert alert-warning fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Producto no se pudo editar: ' . $conexion->error . '
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    }
}
?>
<script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
                window.location.href = 'index.php';
            });
        }, 3000);
    </script>
