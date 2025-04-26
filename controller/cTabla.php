<?php
    if (!isset($_SESSION['usuarioDAW207ProyectoFinal']) && isset($_REQUEST['login'])) {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_SESSION['usuarioDAW207ProyectoFinal']) && isset($_REQUEST['miCuenta'])) {
        $_SESSION['paginaEnCurso'] = 'miCuenta';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_SESSION['usuarioDAW207ProyectoFinal']) && isset($_REQUEST['cerrarSesion'])) {
        header('Location: index.php');
        exit();
    }
    
    $campos = [];
    $datosColeccionables = [];
    
    require_once $view['layout'];
?>