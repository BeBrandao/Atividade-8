<?php
require_once __DIR__ . '/../models/usuario.php';

class UsuarioController {
    public function Logar() {
        require __DIR__ . '/../views/login.php';
    }

    public function Entrou() {
        $usuario = $_POST['usuario']
        if ($usuario) {
            $_SESSION['usuario'] = $usuarioEncontrado['usuario'];
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
}
?>
