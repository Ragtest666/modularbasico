<!-- Agrega el formulario con el botón de eliminar -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar Colaborador y usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de eliminar este Colaborador?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="" id="elim" class="btn btn-primary" name="eliminar">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['eliminar'])) {
    $id = $_POST["eliminar"];

    $sqlUsuarios = "DELETE FROM Usuarios WHERE id_trabajador=?";
    $stmtUsuarios = $conexion->prepare($sqlUsuarios);

    $sqlTrabajadores = "DELETE FROM Trabajadores WHERE id=?";
    $stmtTrabajadores = $conexion->prepare($sqlTrabajadores);

    if ($stmtUsuarios && $stmtTrabajadores) {
        $stmtUsuarios->bind_param("i", $id);
        $stmtUsuarios->execute();

        $stmtTrabajadores->bind_param("i", $id);
        $stmtTrabajadores->execute();

        if ($stmtUsuarios->affected_rows > 0 && $stmtTrabajadores->affected_rows > 0) {
            printf('<div class="alert alert-success d-flex fixed-top position-absolute align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        Colaborador y usuario eliminados correctamente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            
        }

        $stmtUsuarios->close();
        $stmtTrabajadores->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
}
?>
