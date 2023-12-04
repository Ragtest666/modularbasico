<?php
$url=$_SERVER["PHP_SELF"];
if($url=="/ModularBasico/index.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link active"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-clientes.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link active"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-productos.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link active"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-pedidos.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link active nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/historial.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item active">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-usuarios.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link active"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/index.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link active"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-clientes.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link active"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-productos.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link active"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-pedidos.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link active nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/historial.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item active">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}elseif($url=="/ModularBasico/catalogo-usuarios.php"){
    printf('<div class="sidebar pe-4 pb-3">
    <nav class="navbar naranja navbar-dark">
        <a href="index.php" class="mx-4 d-lg-block d-sm-block">
            <h3 class="text-primary"> <img src="img/Logo.png" width="200" height="80"></h3>
        </a>
        <div class="navbar-nav pt-5 w-100">
            <div class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i>Inicio</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-usuarios.php" class="nav-link active"><i class="fa fa-users me-2"></i>Colaboradores</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-clientes.php" class="nav-link"><i class="fa fa-user-edit me-2"></i>Catalogo Clientes</a>
            </div>
            <div class="nav-item">
                <a href="catalogo-productos.php" class="nav-link"><i class="fa fa-tags me-2"></i>Productos</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Pedidos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="catalogo-pedidos.php" class="dropdown-item active">Generar Pedido</a>
                    <a href="historial.php" class="dropdown-item">Historial</a>
                </div>
            </div>
        </div>
    </nav>
</div>');
}
?>