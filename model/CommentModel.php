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
}
?>
