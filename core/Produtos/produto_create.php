<?php
include '../../infra/db.php';
include '../../components/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = (int)$_POST['quantidade'];
    $preco = (float)$_POST['preco'];
    $categoria = $_POST['categoria'];
    $estoque_minimo = (int)$_POST['estoque_minimo'];

    $sql = "INSERT INTO produtos (nome, descricao, quantidade, preco, categoria, estoque_minimo)
            VALUES ('$nome', '$descricao', $quantidade, $preco, '$categoria', $estoque_minimo)";
    if ($conexao->query($sql)) {
        echo "<p>Produto criado com sucesso!</p>";
    } else {
        echo "<p>Erro ao criar produto: " . $conexao->error . "</p>";
    }
}
?>

<h2>Cadastrar Produto</h2>
<form method="post">
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Descrição</label>
    <input type="text" name="descricao" class="form-control">
  </div>
  <div class="mb-3">
    <label>Quantidade</label>
    <input type="number" name="quantidade" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Preço</label>
    <input type="number" step="0.01" name="preco" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Categoria</label>
    <input type="text" name="categoria" class="form-control">
  </div>
  <div class="mb-3">
    <label>Estoque Mínimo</label>
    <input type="number" name="estoque_minimo" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<br><p><a href="produto_list.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>
