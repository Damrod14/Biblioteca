<?php

require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo = 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">
                <strong>Biblioteca Escolar</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contacto</a>
                    </li>
                </ul>
                <a href="carrito.php" class="btn btn-primary">Apartados</a>
            </div>
        </div>
    </div>
</header>


<main>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($resultado as $row){?>
                <div class="col">
                    <div class="card shadow-sm">
                        
                        <?php
                        /*obtenemos los datos de la BD*/
                        $id = urlencode($row['id']);
                        $nombre = $row['nombre'];
                        /*$autor = $row['autor'];*/
                        $imagen = "images/libros/" . $nombre . ".jpg";
                        if(!file_exists($imagen)){
                            $imagen = "images/no-photo.jpg";
                        }
                        ?>
                        <img class="libro" src="<?php echo $imagen; ?>">

                        <div class="card-body">
                            <h5 class="card-tittle"><?php echo $row['nombre']; ?></h5>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="" class="btn btn-success">Apartar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
