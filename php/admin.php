<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <link rel="stylesheet" href="../estilos/admin.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
  <div class="row">
    <form method="POST" action="guardar_producto.php" enctype="multipart/form-data">
      <h3>Agregar productos</h3>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>
      <br>
      <label for="categoria">Categoría:</label>
      <input type="text" id="categoria" name="categoria" required>
      <br>
      <label for="genero">Género:</label>
      <input type="text" id="genero" name="genero" required>
      <br>
      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" required>
      <br>
      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" name="imagen" required>
      <br>
      <input type="submit" value="Guardar">
    </form>

    <form method="POST" action="eliminar_producto.php">
      <h3>Eliminar producto</h3>
      <label for="id">ID del producto:</label>
      <input type="text" id="id" name="id" required>
      <br>
      <input type="submit" value="Eliminar">
    </form>

    <form method="POST" action="actualizar_producto.php" enctype="multipart/form-data">
      <h3>Actualizar producto</h3>
      <label for="id">ID del producto:</label>
      <input type="text" id="id" name="id" required>
      <br>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>
      <br>
      <label for="categoria">Categoría:</label>
      <input type="text" id="categoria" name="categoria" required>
      <br>
      <label for="genero">Género:</label>
      <input type="text" id="genero" name="genero" required>
      <br>
      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" required>
      <br>
      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" name="imagen" required>
      <br>
      <input type="submit" value="Actualizar">
    </form>

    <button type="submit" name="send2"><a href="../index.php">Back</a></button>
  </div>

</body>
</html>