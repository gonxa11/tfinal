<?php

    // Clase Producto
    class Producto
    {
        private $nombre;
        private $categoria;
        private $genero;
        private $precio;
        private $imagen;

        public function __construct($nombre, $categoria, $genero, $precio, $imagen)
        {
            $this->nombre = $nombre;
            $this->categoria = $categoria;
            $this->genero = $genero;
            $this->precio = $precio;
            $this->imagen = $imagen;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getCategoria()
        {
            return $this->categoria;
        }

        public function getGenero()
        {
            return $this->genero;
        }

        public function getPrecio()
        {
            return $this->precio;
        }

        public function getImagen()
        {
            return $this->imagen;
        }
    }

    // Clase para gestionar la base de datos
    class Database
    {
        private $conn;

        public function __construct($servername, $username, $password, $database)
        {
            $this->conn = new mysqli($servername, $username, $password, $database);
            if ($this->conn->connect_error) {
                die("Error al conectar con la base de datos: " . $this->conn->connect_error);
            }
        }

        public function guardarProducto(Producto $producto)
        {
            $nombre = $producto->getNombre();
            $categoria = $producto->getCategoria();
            $genero = $producto->getGenero();
            $precio = $producto->getPrecio();
            $imagen = $producto->getImagen();

            $sql = "INSERT INTO productos (nombre, categoria, genero, precio, imagen) VALUES ('$nombre', '$categoria', '$genero', $precio, '$imagen')";
            if ($this->conn->query($sql) === TRUE) {
                echo "Producto guardado correctamente.";
            } else {
                echo "Error al guardar el producto: " . $this->conn->error;
            }
        }

        public function obtenerProductos()
        {
            $sql = "SELECT * FROM productos";
            $result = $this->conn->query($sql);

            $productos = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $producto = new Producto($row["nombre"], $row["categoria"], $row["genero"], $row["precio"], $row["imagen"]);
                    $productos[] = $producto;
                }
            }

            return $productos;
        }

        public function cerrarConexion()
        {
            $this->conn->close();
        }
    }

    // Crear una instancia de la clase Database
    $database = new Database("localhost", "id20707046_eider", "Gonzalez19@", "id20707046_final");

    // Obtener los productos de la base de datos
    $productos = $database->obtenerProductos();

    // Mostrar los productos
    foreach ($productos as $producto) {
        echo "<div class='card'>";
        echo "<h3>" . $producto->getNombre() . "</h3>";
        echo "<p>Categoría: " . $producto->getCategoria() . "</p>";
        echo "<p>Género: " . $producto->getGenero() . "</p>";
        echo "<p>Precio: $" . $producto->getPrecio() . "</p>";
        echo "<img src='" . $producto->getImagen() . "' alt='Imagen del producto'>";
        echo "</div>";
    }

    // Cerrar la conexión con la base de datos
    $database->cerrarConexion();

?>
