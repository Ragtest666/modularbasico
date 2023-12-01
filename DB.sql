-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS PanaderiaDB;
USE PanaderiaDB;

-- Tabla para Usuarios
CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_usuario ENUM('Admin', 'Colaborador') NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    id_colaborador INT,
    FOREIGN KEY (id_colaborador) REFERENCES Colaboradores(id)
);

-- Tabla para Clientes
CREATE TABLE Clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    correo VARCHAR(100) UNIQUE,
    direccion VARCHAR(255) NOT NULL,
    colonia VARCHAR(50),
    tipo_local VARCHAR(50),
    codigo_postal VARCHAR(10),
    num_interior VARCHAR(10),
    num_exterior VARCHAR(10),
    imagen VARCHAR(255)
);

-- Tabla para Productos
CREATE TABLE Productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(50) NOT NULL,
    precio_menudeo DECIMAL(10, 2) NOT NULL,
    precio_mayoreo DECIMAL(10, 2) NOT NULL,
    descripcion TEXT,
    imagen VARCHAR(255)
);

-- Tabla para Pedidos
CREATE TABLE Pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_producto INT,
    cantidad INT NOT NULL,
    descripcion_pedido TEXT,
    fecha_realizacion DATE,
    fecha_entrega DATE,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id),
    FOREIGN KEY (id_producto) REFERENCES Productos(id)
);

-- Tabla para Colaboradores
CREATE TABLE Colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    nss VARCHAR(20) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    curp VARCHAR(18) NOT NULL
);