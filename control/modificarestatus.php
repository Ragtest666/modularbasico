<?php
require_once("conexion.php");

if (isset($_POST['proceso'])) {
    $id = $_POST["proceso"];
        $sql = "UPDATE Pedidos SET
            estatus='En proceso'
            WHERE id = $id";
       if ($conexion->query($sql) === TRUE) {
        printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    El pedido esta en proceso.
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
}elseif (isset($_POST['entregado'])) {
    $id = $_POST["entregado"];
        $sql = "UPDATE Pedidos SET
            estatus='Entregado'
            WHERE id = $id";
       if ($conexion->query($sql) === TRUE) {
        printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    El pedido ha sido entregado
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
}elseif (isset($_POST['cancelado'])) {
    $id = $_POST["cancelado"];
        $sql = "UPDATE Pedidos SET
            estatus='Cancelado'
            WHERE id = $id";
       if ($conexion->query($sql) === TRUE) {
        printf('<div class="alert alert-success fixed-top position-absolute d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    El pedido ha sido cancelado
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
