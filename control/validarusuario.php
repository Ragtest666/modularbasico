<?php
session_start();
require_once("conexion.php");
    if(isset($_POST['entrar'])){
        $usuario=$_POST['usuario'];
        $contra=$_POST['contra'];
        if (empty($usuario)|| empty($contra)) {
        print('<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sin Datos</strong> llena por favor los campos
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        }else{    
        $consulta="SELECT * FROM Usuarios WHERE nombre='$usuario'"; 
        $resultados=mysqli_query($conexion,$consulta) or die (mysqli_error()); 
        $fila=mysqli_fetch_array($resultados);
        if ($fila["contrasena"]==$contra) {
            
            $_SESSION["nombre"]=$usuario;
            session_start();
            header("Location:index.php");
        } 
        else{
            header("Location:signin.php");
        }
        }  
    }

?>