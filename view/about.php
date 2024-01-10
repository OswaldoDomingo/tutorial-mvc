<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
</head>

<body>
    <h1><?php echo $mensaje ?></h1>
    <p>Esta es la página Acerca de mi</p>
    <p>Volver a <a href="index.php?page=home">inicio</a></p>
    <form action="index.php?page=about" method="post">
        <textarea type="text" id="comment" name="comment" placeholder="Escribe tu comentario"></textarea>
        <input type="submit" value="Enviar comentario" name="enviar">
    </form>
    <h2>Comentarios</h2>
    <?php
    if (empty($comments)) {
        echo "<p>No hay comentarios</p>";
    } else {
        foreach ($comments as $comment) {
            echo "
            <p><i>Usuario: " . $comment['usuario_id'] . "</i></p>
            <p>Comentario número: <i>" . $comment['id'] . "</i></p>
            <p>Comentario:</br><b>" . htmlspecialchars($comment['comentario']) . "</b></p>";
        }
    }
    ?>

</body>

</html>