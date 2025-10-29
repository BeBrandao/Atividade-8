<?php
session_start();


require_once 'app/controllers/ProdutoController.php';
require_once 'app/controllers/UsuarioController.php';

$controller = new ProdutoController();
$controllerUser = new UsuarioController();

$acao = $_GET['acao'] ?? 'index';
$id = $_GET['id'] ?? '';

echo $acao;

if (method_exists($controller, $acao)) {
    if($id){
        $controller->$acao($id);
    } else {
        $controller->$acao();
    }
}elseif (method_exists($controllerUser, $acao)){
}
 else {
    echo "Ação inválida!";
}
