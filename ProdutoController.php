<?php
require_once __DIR__ . '/../models/produto.php';

class ProdutoController {
    public function index() {
        $produtos = Produto::listar();
        require __DIR__ . '/../views/produtos.php';
    }

    public function novo() {
        require __DIR__ . '/../views/novo_produto.php';
    }

    public function nome($id) {
        if ($id) {
            $produto = Produto::buscar_id($id);
        } else {
            echo "Não foi encontrado";
        }
        require __DIR__ . '/../views/editar_produto.php';
    }
    
    public function salvar() {
        $nome = $_POST['nome'] ?? '';
        $preco = $_POST['preco'] ?? '';
        
        if ($nome && $preco) {
            Produto::adicionar($nome, $preco);
            header('Location: index.php?mensagem=Produto+cadastrado+com+sucesso!&tipo=sucesso');
        } else {
            header('Location: index.php?mensagem=Preencha+todos+os+campos!&tipo=erro');
        }
    }

    public function excluir($id) { 
        if ($id) {
            Produto::apagar($id);
            header('Location: index.php?mensagem=Produto+excluído+com+sucesso!&tipo=sucesso');
        } else {
            header('Location: index.php?mensagem=Produto+não+encontrado!&tipo=erro');
        }
    }

    public function editar($id) { 
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        if ($id) {
            Produto::edicao($nome, $preco, $id);
            header('Location: index.php?mensagem=Produto+editado+com+sucesso!&tipo=sucesso');
        } else {
            header('Location: index.php?mensagem=Produto+não+encontrado!&tipo=erro');
        }
    }
}
?>
