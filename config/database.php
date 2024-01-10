<?php
// configuración básica para conectar una aplicación PHP a una base de datos MySQL utilizando PDO (PHP Data Objects). PDO es una interfaz para acceder a bases de datos en PHP.
// Primero, se definen varias variables con los detalles de la conexión a la base de datos: el nombre de host, el nombre de la base de datos, el nombre de usuario y la contraseña. Estos valores se utilizan para crear una cadena de conexión DSN (Data Source Name) que se utiliza para crear una instancia de PDO.
$host = 'localhost';
$db   = 'mvctutorial';
$user = 'root';
$pass = 'kali';
$charset = 'utf8mb4';

//A continuación, se crea la cadena DSN (Data Source Name), que es una cadena que contiene la información necesaria para conectar con la base de datos:
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

//Luego, se define un array de opciones para la conexión PDO. Estas opciones establecen el modo de error a ERRMODE_EXCEPTION (lo que significa que se lanzarán excepciones en caso de error), el modo de recuperación predeterminado a FETCH_ASSOC (lo que significa que los resultados se devolverán como arrays asociativos) y ATTR_EMULATE_PREPARES a false (lo que significa que PDO no emulará las consultas preparadas y las enviará directamente al servidor MySQL):

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
//Finalmente, se intenta crear un nuevo objeto PDO con la cadena DSN, el nombre de usuario, la contraseña y las opciones. Si algo va mal (por ejemplo, si los detalles de la conexión son incorrectos), se lanza una excepción:

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
