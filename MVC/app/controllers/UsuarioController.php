<?php
require_once __DIR__ . '/../models/usuario.php';

class UsuarioController {
    public function Logar() {
        require __DIR__ . '/../views/login.php';
    }

    public function entrou() {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        if (isset($usuario) && isset($senha)) {
            $usuario_encontrado = Usuario::pegar_usuario($usuario);
            if($usuario_encontrado['nome'] === $usuario){
                if($usuario_encontrado['senha'] === $senha){
                    $_SESSION['user'] = 'logado';
                    header('Location: index.php?acao=index');
                    exit;
                } else {
                    header('Location: ../views/login.php?erro=senha_incorreta');
                    exit;
                }
            } else {
                header('Location: ../views/login.php?erro=usuario_nao_encontrado');
                exit;
            }
        } else {
            echo "<script>
                    alert('Usuário ou senha não preenchidos!');
                    window.location.href='app/views/login.php';
                  </script>";
            exit;
        }
    }
}
?>
