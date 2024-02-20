<?php
    // Establecer la conexión con la base de datos
    $host = "localhost";
    $user = "id20707046_eider";
    $pass = "Gonzalez19@";
    $db = "id20707046_final";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Obtener el ID del producto a eliminar
    $id = $_POST['id'];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos2 WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Cerrar la conexión con la base de datos
    $conn->close();
?>
