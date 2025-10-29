<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuarioCorreto = 'admin';
    $senhaCorreta = '1234';

    if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
        $_SESSION['usuario'] = $usuario;
        header('Location: app/views/produtos.php');
        exit;
    } else {
        echo "<script>
                alert('Usuário ou senha incorretos!');
                window.location.href='app/views/login.php';
              </script>";
        exit;
    }
}

if (isset($_SESSION['usuario'])) {
    header('Location: app/views/produtos.php');
    exit;
}

header('Location: app/views/login.php');
exit;

require_once 'app/controllers/ProdutoController.php';

$controller = new ProdutoController();

$acao = $_GET['acao'] ?? 'index';
$id = $_GET['id'] ?? '';

if (method_exists($controller, $acao)) {
    if($id){
        $controller->$acao($id);
    } else {
        $controller->$acao();
    }
    
} else {
    echo "Ação inválida!";
}
