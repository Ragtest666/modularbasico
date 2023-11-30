<?php
require_once("conexion.php");
if (isset($_POST['agregar'])) {
    $nombre_producto = $_POST["nombre_producto"];
    $precio_menudeo = $_POST["precio_menudeo"];
    $precio_mayoreo = $_POST["precio_mayoreo"];
    $descripcion = $_POST["descripcion"];

    $carpeta_imagenes = "img/productos/";

    if ($_FILES["imagen"]["name"] !== "") {
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);
    } else {
        $nombre_imagen = $conexion->insert_id . "_" . $nombre . ".jpg";
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;
        copy("https://st2.depositphotos.com/1104517/11967/v/600/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg", $ruta_imagen);
    } 

    $sql = "INSERT INTO Productos (nombre_producto, precio_menudeo, precio_mayoreo, descripcion, imagen)
            VALUES ('$nombre_producto', $precio_menudeo, $precio_mayoreo, '$descripcion', '$ruta_imagen')";

    if ($conexion->query($sql) === TRUE) {
        printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
       <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
       <div>
         Producto agregado correctamente
       </div>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>
