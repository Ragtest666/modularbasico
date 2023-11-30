<!-- Agrega el formulario con el botón de eliminar -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar trabajador y usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de eliminar este trabajador y su usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="" id="elim" class="btn btn-primary" name="eliminar" >Si</button>
                </div>
            </div>
        </div>
    </div>


<?php
if (isset($_POST['eliminar'])) {
    $id = $_POST["eliminar"];

    $sqlTrabajadores = "DELETE FROM Trabajadores WHERE id=?";
    $stmtTrabajadores = $conexion->prepare($sqlTrabajadores);

    $sqlUsuarios = "DELETE FROM Usuarios WHERE id_trabajador=?";
    $stmtUsuarios = $conexion->prepare($sqlUsuarios);

    if ($stmtTrabajadores && $stmtUsuarios) {
        $stmtTrabajadores->bind_param("i", $id);
        $stmtTrabajadores->execute();

        $stmtUsuarios->bind_param("i", $id);
        $stmtUsuarios->execute();

        // Verifica si ambas consultas fueron exitosas
        if ($stmtTrabajadores->affected_rows > 0 && $stmtUsuarios->affected_rows > 0) {
            printf('<div class="alert alert-success d-flex fixed-top position-absolute align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        Trabajador y usuario eliminados correctamente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            printf('<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        No se pudo eliminar el trabajador y usuario
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        // Cierra las sentencias preparadas
        $stmtTrabajadores->close();
        $stmtUsuarios->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
}
?>
