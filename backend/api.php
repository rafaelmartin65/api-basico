<?php
// Función para manejar la solicitud de creación de un artículo
function crearArticuloApi() {
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $conn = conectar();
    $result = crearArticulo($conn, $descripcion, $precio);
    $conn->close();
    return $result;
}

// Función para manejar la solicitud de lectura de todos los artículos
function leerArticulosApi() {
    $conn = conectar();
    $result = leerArticulos($conn);
    $conn->close();
    return $result;
}

// Función para manejar la solicitud de lectura de un artículo por código
function leerArticuloPorCodigoApi() {
    $codigo = $_GET['codigo'];
    $conn = conectar();
    $result = leerArticuloPorCodigo($conn, $codigo);
    $conn->close();
    return $result;
}

// Función para manejar la solicitud de actualización de un artículo
function actualizarArticuloApi() {
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $conn = conectar();
    $result = actualizarArticulo($conn, $codigo, $descripcion, $precio);
    $conn->close();
    return $result;
}

// Función para manejar la solicitud de eliminación de un artículo
function eliminarArticuloApi() {
    $codigo = $_GET['codigo'];
    $conn = conectar();
    $result = eliminarArticulo($conn, $codigo);
    $conn->close();
    return $result;
}
?>