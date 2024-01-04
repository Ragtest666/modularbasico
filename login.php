<?php
include("control/validarusuario.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesi&oacute;n</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="img/favicon.ico" rel="icon">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
       
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="cafeoscuro rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="" method="POST">
                            <div class="d-flex align-items-center justify-content-center between mb-5">
                                <img src="img/Logo.png" alt="" height="125" width="300">
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3>Iniciar Sesión</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="texto" class="cafeclaro form-control" id="floatingInput" name="usuario" placeholder="name@example.com">
                                <label for="floatingInput">Usuario</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="cafeclaro form-control" id="floatingPassword" name="contra" placeholder="color:#66260b Password">
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                            <!-- inicio recuperar contraseña -->

                        <div class=" container-fluid ">
                                   
                                   <!-- Button trigger modal -->
                  
                                   <div class=" text-center justify-content-between mb-4"  >
                                       <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">¿Olvidaste la contraseña?</a>
                                   </div>
                                   
                                   <!-- Modal -->
                                   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                           <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body">
                                                <!-- Container Agregar Producto Start -->
                                                               <div class=" rounded h-100 p-4   row " >
                                                                   <div class="form-floating mb-3">
                                                                       <input type="text" class="cafeclaro form-control" id="floatingInput" placeholder="name@example.com">
                                                                       <label for="floatingInput">Ingresa Usuario</label>
                                                                   </div>
                                                               </div>
                                                <!-- Container Agregar Producto Start -->               
                                           </div>
                                           <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                           <button type="button" class="btn btn-primary" name="recuperar" >Solicitar contraseña</button>
                                           </div>
                                       </div>
                                       </div>
                                   </div>
                             
                      
                   </div>

              <!-- end recuperar contraseña -->
                            <button type="submit" name="entrar" class="btn button py-3 w-100 mb-4">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->

    <script src="js/main.js"></script>

</html>