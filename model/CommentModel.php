<?php
// model/CommentModel.php
//Ruta del config/database.php
require_once 'config/database.php';

class CommentModel {
    // Propiedad para almacenar la conexión a la base de datos MySQL (PDO)
    private $pdo;

    // Constructor que recibe la conexión a la base de datos
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Método para guardar un comentario en la base de datos
    public function saveComment($usuario, $comment) {
        if (empty($comment)) {
            // Manejar comentario vacío, no se puede guardar en la base de datos un comentario vacío.
            // con return se sale de la función y no se ejecuta el código que viene después.
            return;
        }
        if(empty($usuario)) {
            // Manejar usuario vacío, si no hay usuario logueado, se guarda el comentario con el id 0
            $usuario = 0;
        }
        $stmt = $this->pdo->prepare("INSERT INTO comentarios (usuario_id, comentario) VALUES (:usuario, :comment)");
        $stmt->execute(['usuario' => $usuario, 'comment' => $comment]);
    }

    // Método para obtener todos los comentarios de la base de datos
    public function getComments() {
        $stmt = $this->pdo->query("SELECT * FROM comentarios");
        return $stmt->fetchAll();
    }

    // Método para borrar comentarios de la base de datos
    public function deleteComments($idsParaBorrar) {
        // $idsParaBorrar es un array con los ids de los comentarios que queremos borrar
        //Por ejemplo $idsParaBorrar es [1,4,55,6,78,90]. 
        //Necesitamos convertirlo en una cadena para la consulta SQL: (1,4,55,6,78,90) 
        if (!empty($idsParaBorrar)) {
            //array_fill(0, count($idsParaBorrar), '?') está creando un array con tantos elementos como el número de elementos en $idsParaBorrar, 
            //y todos los elementos son '?'. Esto se utiliza para crear una cadena de marcadores de parámetros para la declaración SQL.
            //implode(',', array_fill(0, count($idsParaBorrar), '?')) está uniendo los elementos del array creado por 
            //array_fill(0, count($idsParaBorrar), '?') con comas. 
            //Como resultado, obtienes una cadena de marcadores de parámetros para la declaración SQL, algo como '?,?,?,?,?,?'.
            $placeholders = implode(',', array_fill(0, count($idsParaBorrar), '?'));
            

            //$stmt = $this->pdo->prepare("DELETE FROM comentarios WHERE id IN (?,?,?,?,?,?)"); // 6 placeholders para 6 ids a borrar 
            //DELETE FROM comentarios WHERE id IN (1,4,55,6,78,90)
            $stmt = $this->pdo->prepare("DELETE FROM comentarios WHERE id IN ($placeholders)");

            $stmt->execute($idsParaBorrar);
        }
    }
}
?>
