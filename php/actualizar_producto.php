<?php
    // Establecer la conexión con la base de datos
    $host = "localhost";
    $user = "id20707046_eider";
    $pass = "";
    $db = "id20707046_final";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];

    // Procesar y guardar la imagen si se proporciona una nueva
    if ($_FILES["imagen"]["name"]) {
        $fileinfo = pathinfo($_FILES["imagen"]["name"]);
        $newfilename = $fileinfo["filename"] . "_" . time() . "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../upload/" . $newfilename);
        $location = "upload/" . $newfilename;
        
        // Actualizar los datos del producto en la base de datos incluyendo la nueva imagen
        $sql = "UPDATE productos2 SET nombre = '$nombre', categoria = '$categoria', genero = '$genero', precio = $precio, imagen = '$location' WHERE id = '$id'";
    } else {
        // Actualizar los datos del producto en la base de datos sin cambiar la imagen
        $sql = "UPDATE productos2 SET nombre = '$nombre', categoria = '$categoria', genero = '$genero', precio = $precio WHERE id = '$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }

    // Cerrar la conexión con la base de datos
    $conn->close();
?>