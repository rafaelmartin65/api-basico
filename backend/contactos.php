<?php

// Crear un nuevo artículo
function crearContacto($datos) {
    $id = $datos['id'];
    $nombre = $datos['nombre'];
    $telefono = $datos['telefono'];
    $email = $datos['email'];
    $stmt = $GLOBALS['conn']->prepare('INSERT INTO contactos (id,nombre, telefono,email) VALUES (?,?,?,?)');
    if ($stmt->execute([$id,$nombre, $telefono, $email]) === TRUE) {
        return 'Contacto creado correctamente';
    } else {
        return 'Error al crear contacto: ';
    }
}

// Leer todos los artículos
function leerContactos() {
    $sql = "SELECT * FROM contactos";
    $result = $GLOBALS['conn']->query($sql);
    $articulos = $result->fetchAll(PDO::FETCH_ASSOC);
    return $articulos;
}

// Leer un artículo por código
function leerContactoPorCodigo($id) {
    $sql = "SELECT * FROM contactos WHERE id = '$id'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->rowCount() > 0) {
        return $result->fetch(PDO::FETCH_ASSOC);
    } else {
        return null;
    }
}

// Actualizar un artículo
function grabarCambiosContacto($datos) {
    $id = $datos['id'];
    $nombre = $datos['nombre'];
    $telefono = $datos['telefono'];
    $email = $datos['email'];
    $stmt = $GLOBALS['conn']->prepare('UPDATE contactos SET nombre = ?, telefono = ? , email = ? WHERE id = ?');
    if ($stmt->execute([$nombre, $telefono, $email, $id]) === TRUE) {
        return 'Contacto actualizado correctamente';
    } else {
        return 'Error al actualizar contacto: ';
    }
}

// Eliminar un artículo
function eliminarContacto($id) {
    $sql = "DELETE FROM contactos WHERE id = '$id'";
    $resultado = $GLOBALS['conn']->prepare($sql);
    $resultado->execute();
    if ($resultado->rowCount() > 0) {
        return 'Contacto eliminado correctamente';
    } else {
        return 'Error al eliminar contacto: ' ;
    }
}
?>