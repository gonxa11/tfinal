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

	// Obtener los datos del formulario
	$nombre = $_POST['nombre'];
	$categoria = $_POST['categoria'];
	$genero = $_POST['genero'];
	$precio = $_POST['precio'];

	// Procesar y guardar la imagen
	$fileinfo=PATHINFO($_FILES["imagen"]["name"]);
	$newfilename=$fileinfo["filename"]."_".time().".".$fileinfo['extension'];
	move_uploaded_file($_FILES["imagen"]["tmp_name"],"../upload/".$newfilename);
	$location="upload/".$newfilename;

	// Guardar los datos del producto en la base de datos
	$sql = "INSERT INTO productos2 (nombre, categoria, genero, precio, imagen) VALUES ('$nombre', '$categoria', '$genero', $precio, '$location')";
	if ($conn->query($sql) === TRUE) {
	    echo "Producto guardado correctamente.";
	} else {
	  echo "Error al guardar el producto: " . $conn->error;
	}

	// Cerrar la conexión con la base de datos
	$conn->close();
?>