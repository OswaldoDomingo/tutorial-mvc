<?php
//controller/lista.php
// Ruta del modelo CommentModel y la clase Comment que vamos a utilizar en este controlador para obtener los comentarios de la base de datos y guardarlos en ella respectivamente (ver model/CommentModel.php)
require 'model/CommentModel.php';

$commentModel = new CommentModel();

$cabecera = "Listado de comentarios";

$comments = $commentModel->getComments();

if (isset($_POST['borrarComentarios'])) {
    $idsParaBorrar = $_POST['borrar'];
    $commentModel = new CommentModel();
    $commentModel->deleteComments($idsParaBorrar);

    // Redirigir para evitar el reenvío del formulario
    header("Location: index.php?page=lista");
    exit();
}


// Cargar la vista
require 'view/lista.php';
?>
