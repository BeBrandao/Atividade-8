<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST" action="index.php?acao=editar&id=<?= $produto['id'] ?>">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br><br>

        <label>Preço:</label><br>
        <input type="number" name="preco" value="<?php echo $produto['preco']; ?>" step="0.01" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <br><a href="index.php">Voltar</a>
</body>
</html>