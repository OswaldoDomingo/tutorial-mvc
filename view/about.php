<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icono.ico" type="image/x-icon">
    <title>Acerca de</title>
</head>

<body>
    <h1><?php echo $mensaje ?></h1>
    <p>Esta es la página Acerca de mi</p>
    <p>Volver a <a href="index.php?page=home">inicio</a></p>
    <p>Ver listado de comentarios <a href="index.php?page=lista">Listado</a></p>
    <form action="index.php?page=about" method="post">
        <textarea type="text" id="comment" name="comment" placeholder="Escribe tu comentario" rows="10" cols=30 ></textarea>
        <input type="submit" value="Enviar comentario" name="enviar">
    </form>
    

</body>

</html>