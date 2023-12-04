<?php
header("Access-Control-Allow-Origin: *"); // Esto permite solicitudes desde cualquier origen. Ajusta según sea necesario.
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
if (isset($_POST['agregar'])) {
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtiene los datos JSON enviados
        $datosJSON = file_get_contents("php://input");
        $datos = json_decode($datosJSON, true);
    
        // $datos ahora contiene un array bidimensional con la información de cada fila
        // Puedes procesarlos según tus necesidades
        print_r($datos);
    }
 
    
}
?>
