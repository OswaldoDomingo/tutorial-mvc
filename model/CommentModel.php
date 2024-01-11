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
    public function saveComment($usuario_id, $comment) {
        if (empty($comment)) {
            // Manejar comentario vacío (opcionalmente)
            return;
        }
        if(empty($usuario_id)) {
            $usuario_id = 0;
        }
        $stmt = $this->pdo->prepare("INSERT INTO comentarios (usuario_id, comentario) VALUES (:usuario_id, :comment)");
        $stmt->execute(['usuario_id' => $usuario_id, 'comment' => $comment]);
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

            $placeholders = implode(',', array_fill(0, count($idsParaBorrar), '?'));
            //$stmt = $this->pdo->prepare("DELETE FROM comentarios WHERE id IN (?,?,?,?,?,?)"); // 6 placeholders para 6 ids a borrar 

            $stmt = $this->pdo->prepare("DELETE FROM comentarios WHERE id IN ($placeholders)");
            //DELETE FROM comentarios WHERE id IN (1,4,55,6,78,90)

            $stmt->execute($idsParaBorrar);
        }
    }
}
?>
