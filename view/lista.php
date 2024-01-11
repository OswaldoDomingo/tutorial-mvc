<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de comentarios</title>
    <link rel="stylesheet" href="view/css/estilo.css">
</head>
<body>
<h1><?php echo $cabecera ?></h1>
<p>Volver a <a href="index.php?page=home">Inicio</a></p>
    <?php
    if (empty($comments)) {
        echo "<p>No hay comentarios</p>";
    } else {
        foreach ($comments as $comment) {
            echo "
            <div class='comentario'>
            <p><i>Usuario: " . $comment['usuario_id'] . "</i></p>
            <p>Comentario número: <i>" . $comment['id'] . "</i></p>
            <p>Comentario:</br><b>" . htmlspecialchars($comment['comentario']) . "</b></p>
            </div>";
        }
    }
    ?>
</body>
</html>