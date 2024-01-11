<!DOCTYPE html>
<html lang="es">
    <!-- view/lista.php -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de comentarios</title>
    <link rel="stylesheet" href="view/css/estilo.css">
</head>
<body>
<h1><?php echo $cabecera ?></h1>
<p>Volver a <a href="index.php?page=home">Inicio</a></p>
<form action="index.php?page=lista" method="post">
    <?php
    if (empty($comments)) {
        echo "<p>No hay comentarios</p>";
    } else {
        foreach ($comments as $comment) {
            echo "
            <div class='comentario'>
            <input type='checkbox' name='borrar[]' value='" . $comment['id'] . "'>
            <p><i>Usuario: " . $comment['usuario_id'] . "</i></p>
            <p>Comentario número: <i>" . $comment['id'] . "</i></p>
            <p>Comentario:</br><b>" . htmlspecialchars($comment['comentario']) . "</b></p>
            </div>";
        }
    }
    ?>
    <input type="submit" name="borrarComentarios" value="Borrar comentarios">
</form>
</body>
</html>