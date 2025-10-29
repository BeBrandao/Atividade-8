<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<?php if (isset($_GET['mensagem'])): ?>
    <?php
        $cor = ($_GET['tipo'] ?? '') === 'sucesso' ? '#4CAF50' : '#f44336';
    ?>
    <div style="background-color: <?= $cor ?>; color: white; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
        <?= htmlspecialchars($_GET['mensagem']) ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Produtos</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { width: 50%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h1>Catálogo de Produtos</h1>

    <a href="index.php?acao=novo">Adicionar Novo Produto</a><br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço (R$)</th>
        </tr>
        <?php foreach ($produtos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nome']) ?></td>
            <td><?= number_format($p['preco'], 2, ',', '.') ?></td>
            <td>
                <a href="index.php?acao=excluir&id=<?= $p['id'] ?>" 
                   onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                   🗑️
                </a>
            </td>
            <td>
                <a href="index.php?acao=nome&id=<?= $p['id'] ?>">
                    ✏️
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

