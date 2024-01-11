<?php
//controller/lista.php
// Ruta del modelo CommentModel y la clase Comment que vamos a utilizar en este controlador para obtener los comentarios de la base de datos y guardarlos en ella respectivamente (ver model/CommentModel.php)
require 'model/CommentModel.php';

$commentModel = new CommentModel();

$cabecera = "Listado de comentarios";

$comments = $commentModel->getComments();




// Cargar la vista
require 'view/lista.php';
?>
