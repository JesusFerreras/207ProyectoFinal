<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="webroot/css/estilos.css">
        <title>207 Proyecto Final</title>
    </head>
    <body>
        <?php
            require_once $view[$_SESSION['paginaEnCurso']];
        ?>
    </body>
</html>