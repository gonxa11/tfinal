<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totto TFinal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
</head>
<body>
    <div class="bar-top">
        <div class="row">
            <div class="col-md-4">
                <img src="img/logo.webp" alt="">
                <a class="menu">
                    <span class="span_1"></span>
                    <span class="span_2"></span>
                    <span class="span_3"></span>
                </a>
                <span class="txt">Categoria</span>
            </div>

            <div class="col-md-4">
                <form method="GET">
                    <select name="filtro" id="filtro" class="filtro">
                        <option value="categoria">Categoría</option>
                    </select>
                    <input type="text" placeholder="Ingrese término de búsqueda" name="termino">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                    </button>
                </form>
            </div>

            <div class="col-md-2">
                <ul>
                    <li class="sub">
                        <h3>mis servicios</h3> 
                        <ul class="submenu">
                            <li><a href="php/login.php">Inicio De Sesión</a></li>
                            <li>Historial</li>
                            <li>Rastreo Servientrega</li>
                            <li>Rastreo Coordinadora</li>
                            <li>Salir</li>
                         </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16"><path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="container menu-hamburguesa">
        <ul class="main-list">
            <li class="item-descubre item">descubre</li>
            <li class="item-morrales item">morrales</li>
            <li class="item-mujer item">mujer</li>
            <li class="item-hombre item">hombre</li>
            <li class="item-accesorios item">accesorios</li>
            <li class="item-ninos item">niños</li>
            <li class="item-viajes item">viajes</li>
            <li class="item-mascotas item">mascotas</li>
            <li class="item-licencias item">licencias</li>
            <li class="item-emprendimientos item">emprendimientos</li>
            <li class="item-ofertas item">ofertas</li>
            <li class="item-tarjeta-regalo item">tarjeta regalo</li>
        </ul>
    </div>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/2COMBOS-TRAVEL-2023-DK.gif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/2padres-slides-guia-regalos-DK.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/padres-slides-MASCOTAS-dk-231.webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="card-container">
        <center><h1>Productos</h1></center>
        <div class="row">
            <?php
                $host = "localhost";
                $user = "id20707046_eider";
                $pass = "Gonzalez19@";
                $db = "id20707046_final";
                $conn = mysqli_connect($host, $user, $pass, $db);
                
                $queryTotal = mysqli_query($conn, "SELECT COUNT(*) as total FROM productos2");
                $totalProductos = mysqli_fetch_assoc($queryTotal)['total'];
                $productosPorPagina = 9;

                $totalPaginas = ceil($totalProductos / $productosPorPagina);

                $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                $inicio = ($paginaActual - 1) * $productosPorPagina;
                $fin = $inicio + $productosPorPagina;

                $query = mysqli_query($conn, "SELECT * FROM productos2 LIMIT $inicio, $productosPorPagina");

                while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="col-md-4 col-md-6">
                <br>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                        <p class="card-text"><?php echo $row['precio']; ?></p>
                        <a href="#" class="btn btn-primary" id="<?php echo $row['id']; ?>">Go somewhere</a>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        
        <ul class="pagination">
            <?php
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo '<li class="page-item ' . ($paginaActual == $i ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
                }
            ?>
        </ul>
    </div>

    <?php
        $host = "localhost";
        $user = "id20707046_eider";
        $pass = "Gonzalez19@";
        $db = "id20707046_final";
        $conn = mysqli_connect($host, $user, $pass, $db);

        $resultsPerPage = 3;

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($currentPage - 1) * $resultsPerPage;

        if (isset($_GET['filtro']) && isset($_GET['termino'])) {
            $filtro = $_GET['filtro'];
            $termino = $_GET['termino'];

            $query = "SELECT * FROM productos2 WHERE $filtro LIKE '%$termino%' LIMIT $offset, $resultsPerPage";
        } else {
            $query = "SELECT * FROM productos2 LIMIT $offset, $resultsPerPage";
        }

        $result = mysqli_query($conn, $query);

        $totalResults = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM productos2"));

        $totalPages = ceil($totalResults / $resultsPerPage);
    ?>

    <div class="card-container">
        <div class="filter-buttons">
            <a class="btn btn-primary <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'categoria' ? 'active' : ''; ?>" href="?filtro=categoria&termino=bolso">Bolsos</a>
            <a class="btn btn-primary <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'categoria' ? 'active' : ''; ?>" href="?filtro=categoria&termino=chaqueta">Chaquetas</a>
            <a class="btn btn-primary <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'categoria' ? 'active' : ''; ?>" href="?filtro=categoria&termino=camisa">Camisas</a>
            <a class="btn btn-primary <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'categoria' ? 'active' : ''; ?>" href="?filtro=categoria&termino=zapato">Zapatos</a>
        </div>

        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-4 col-md-6">
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                            <p class="card-text"><?php echo $row['precio']; ?></p>
                            <a href="#" class="btn btn-primary" id="<?php echo $row['id']; ?>">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <ul class="pagination">
            <?php
            $filtroParametros = "";
            if (isset($_GET['filtro']) && isset($_GET['termino'])) {
                $filtro = $_GET['filtro'];
                $termino = $_GET['termino'];
                $filtroParametros = "&filtro=$filtro&termino=$termino";
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . $filtroParametros . '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </div>

    <div class="card-container">
        <h1>Destacados de la semana</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="img/unnamed (1).jpg" alt="">
            </div>
            <div class="col-md-6">
                <img src="img/unnamed.jpg" alt="">
            </div>
            <div class="col-md-6">
                <img src="img/unnamed (2).jpg" alt="">
            </div>
            <div class="col-md-6">
                <img src="img/unnamed (3).jpg" alt="">
            </div>
        </div>
    </div>

    <div class="card-container">
        <h1>Lo hacemos junto</h1>
        <div class="row">
            <div class="col-md-4">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/8c-zHUWdf3c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/PZ9HXFCuRzk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/sLIbD9AZYkY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="card-container">
        <h1>#tottoxelmundo</h1>
        <div class="row">
            <div class="col-md-2">
                <img src="img/instagram-barichara.webp" alt="">
            </div>
            <div class="col-md-2">
                <img src="img/instagram-outdoor-junio.webp" alt="">
            </div>
            <div class="col-md-2">
                <img src="img/instagram-plegable-junio.webp" alt="">
            </div>
            <div class="col-md-2">
                <img src="img/instagram-plegables-junio.webp" alt="">
            </div>
            <div class="col-md-2">
                <img src="img/instagram-taze-junio.webp" alt="">
            </div>
            <div class="col-md-2">
                <img src="img/instagram-Traveler-junio.webp" alt="">
            </div>
        </div>
    </div>

    <div class="card-container">
        <div class="row">
            <div class="col-md-3">
                <img src="img/recoge-en-tienda.webp" alt="">
            </div>
            <div class="col-md-3">
                <img src="img/envio-gratis.webp" alt="">
            </div>
            <div class="col-md-3">
                <img src="img/devoluciones.webp" alt="">
            </div>
            <div class="col-md-3">
                <img src="img/coleccion-eco.webp" alt="">
            </div>
        </div>
    </div>

    <div class="card-container">
        <h1>Medios de pago</h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <img src="img/medios-de-pago.webp" alt="">
            </div>
        </div>
    </div>

    <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15863.60637934133!2d-75.57271958950663!3d6.276667378556914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428d1390dd14b%3A0xd4a077ea2c9ce810!2sAranjuez%2C%20Medell%C3%ADn%2C%20Aranjuez%2C%20Medell%C3%ADn%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1687419302849!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul>
                        <li><a href="#"></a>Quiénes somos </li>
                        <li><a href="#"></a>Línea Ética</li>
                        <li><a href="#"></a>Aviso Privacidad</li>
                        <li><a href="#"></a>Talento Totto</li>
                        <li><a href="#"></a>Sostenibilidad</li>
                        <li><a href="#"></a>Prensa</li>
                        <li><a href="#"></a>Negocios empresariales</li>
                        <li><a href="#"></a>Política de Tratamiento de Datos</li>
                    </ul>
                    <ul>
                        <li><a href="#"></a>Servicio Cliente</li>
                        <li><a href="#"></a>Encuentra tu tienda</li>
                        <li><a href="#"></a>Tienda Totto Pets</li>
                        <li><a href="#"></a>Promociones vigentes</li>
                        <li><a href="#"></a>Envios Y Entregas</li>
                        <li><a href="#"></a>Cambios Y Devoluciones</li>
                        <li><a href="#"></a>Escribenos por WhatsApp</li>
                        <li><a href="#"></a>Keypago,Pago facil</li>
                    </ul>
                </div>
            </div>

            <div class="follous col-md-4">
                <h1>Siguenos</h1>
                <div class="links">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/></svg>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h1>¡Regístrate o actualiza tus datos!</h1>
                <div class="NewsletterForm">
                    <div class="__caption">Te damos la bienvenida registrando y/o actualizando tus datos, recibe <strong>10% de descuento en tu próxima compra</strong>  redímelo únicamente en nuestra tienda online.
                    <br><br>
                    Y además disfruta <strong> 25% de descuento en tu compra en el mes de cumpleaños.</strong></div><br><br><div class="__caption"><strong>*Los descuentos de registro/actualización y cumpleaños no son acumulables.<a style="color:#fff;" href="/legales/promociones-vigentes/2023#news-341"> *Aplican términos y condiciones. </a></strong></div><br><br><div class="__caption">*Aplica para productos sin descuento o full Price.
                    </div>
                    <br><br>
                    <a onclick="/info/actualizacion-datos" class="__submit" href="/info/actualizacion-datos" target="_blank">Suscríbete</a>
                </div>
            </div>
        </div>
    </footer>
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>