DROP DATABASE  supermarket;

CREATE DATABASE  supermarket;


USE supermarket;

CREATE TABLE
    categorias (
        categoria_id INT primary key AUTO_INCREMENT,
        categoriaNombre VARCHAR (50) NOT NULL,
        descripcion VARCHAR (50),
        imagen VARCHAR (1000)
    );

CREATE TABLE
    clientes(
        cliente_id INT primary key AUTO_INCREMENT,
        nombre VARCHAR (50) NOT NULL,
        celular INT (15),
        compania TEXT (20)
    );

CREATE TABLE
    empleados(
        empleado_id INT primary key AUTO_INCREMENT,
        nombre VARCHAR (50) NOT NULL,
        celular INT (50),
        direccion TEXT (50),
        imagen VARCHAR (1000)
    );

CREATE TABLE
    facturas(
        factura_id INT primary key AUTO_INCREMENT,
        empleado_id INT (10),
        cliente_id INT (10),
        fecha VARCHAR (1000)
    );

CREATE TABLE
    factura_detalle(
        factura_id INT primary key AUTO_INCREMENT,
        producto_id INT (10),
        cantidad INT (10),
        precio_venta VARCHAR (1000)
    );

CREATE TABLE
    productos(
        producto_id INT (10),
        categoria_id INT primary key AUTO_INCREMENT,
        precio_uni INT (10),
        stock INT (100),
        unidades_pedido INT (10),
        proveedor_id INT (10),
        nombre_producto VARCHAR(60),
        descontinuado TINYINT(1)
    );

CREATE TABLE
    proveedores(
        proveedor_id INT primary key AUTO_INCREMENT,
        nombre VARCHAR(60) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        ciudad VARCHAR(40)
    );