<?php
require_once __DIR__ . '/../../config/database.php';

class Produto {
    public static function listar() {
        $conn = Database::conectar();
        $stmt = $conn->prepare("SELECT * FROM produtos ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function adicionar($nome, $preco) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public static function apagar($id) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function buscar_id($id) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function edicao($nome, $preco, $id) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
