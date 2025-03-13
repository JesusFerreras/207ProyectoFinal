<?php
    foreach (scandir('config') as $fichero) {
        if ($fichero != '.' && $fichero != '..') {
            require_once 'config/'.$fichero;
        }
    }
    
    session_start();
    
    if (!isset($_SESSION['paginaEnCurso'])) {
        $_SESSION['paginaEnCurso'] = 'tabla';
        $_SESSION['tablaEnCurso'] = 'pez';
        $_SESSION['fechaBusqueda'] = new DateTime(isset($_COOKIE['daw207FechaBusqueda'])? $_COOKIE['daw207FechaBusqueda'] : 'now');
    }
    
    require_once $controller[$_SESSION['paginaEnCurso']];
?>