<?php
// controller/about.php

// Ruta del modelo CommentModel y la clase Comment que vamos a utilizar en este controlador para obtener los comentarios de la base de datos y guardarlos en ella respectivamente (ver model/CommentModel.php)
require 'model/CommentModel.php';
// Aquí podrías agregar cualquier lógica específica de la página 'about'
$commentModel = new CommentModel();

// Cargar la vista
$mensaje = "Acerca de mí y mi sitio MVC";

// Enviar el comentario a la base de datos. 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    // Obtener el comentario enviado por el usuario
    $comment = $_POST['comment'];
    //Obtener el id del usuario que ha iniciado sesión
    $user_id = $_POST['user_id'];
    // Guardar el comentario en la base de datos
    $commentModel->saveComment($user_id, $comment);
    // Redirigir para evitar el reenvío del formulario
    header("Location: index.php?page=about");
    // Siempre después de una redirección se debe hacer un exit,  se utiliza para asegurar que la ejecución del script se detiene después de que se ha enviado la cabecera de redirección.
    exit();
}

require 'view/about.php';
?>