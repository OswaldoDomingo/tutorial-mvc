<?php
// controller/about.php

// Ruta del modelo CommentModel y la clase Comment que vamos a utilizar en este controlador para obtener los comentarios de la base de datos y guardarlos en ella respectivamente (ver model/CommentModel.php)
require 'model/CommentModel.php';
// Aquí podrías agregar cualquier lógica específica de la página 'about'
$commentModel = new CommentModel();

// Cargar la vista
$mensaje = "Acerca de mí y mi sitio MVC";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    $comment = $_POST['comment'];
    $commentModel->saveComment($user_id, $comment);
    // Redirigir para evitar el reenvío del formulario
    header("Location: index.php?page=about");
    exit();
}

$comments = $commentModel->getComments();
require 'view/about.php';
?>