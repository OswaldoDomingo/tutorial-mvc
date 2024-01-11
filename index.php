<?php
// index.php - Punto de entrada de la aplicación

// Este es un enrutador muy básico

// Obtén la página desde la URL, por defecto será 'home'
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Dependiendo de la página, requerimos diferentes controladores
switch ($page) {
    case 'home':
        require 'controller/home.php';
        break;
    case 'about':
        require 'controller/about.php';
        break;
    case 'lista':
        require 'controller/lista.php';
        break;
    default:
        require 'controller/error.php'; // Controlador para página de error
}
