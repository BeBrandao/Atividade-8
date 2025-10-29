<?php
require_once __DIR__ . '/../../config/database.php';

class Usuario {
    public static function pegar_usuario($usuario) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>