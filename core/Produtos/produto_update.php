<?php
include '../../infra/db.php';
include '../../components/header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  echo "<p>ID não fornecido.</p>";
  include '../../components/footer.php';
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $quantidade = (int)$_POST['quantidade'];
  $preco = (float)$_POST['preco'];
  $categoria = $_POST['categoria'];
  $estoque_minimo = (int)$_POST['estoque_minimo'];

  $sql = "UPDATE produtos
          SET nome='$nome',
              descricao='$descricao',
              quantidade=$quantidade,
              preco=$preco,
              categoria='$categoria',
              estoque_minimo=$estoque_minimo
          WHERE id = $id";
  if ($conexao->query($sql)) {
    echo "<p>Produto atualizado com sucesso!</p>";
  } else {
    echo "<p>Erro ao atualizar: " . $conexao->error . "</p>";
  }
}

$sql = "SELECT * FROM produtos WHERE id = $id";
$result = $conexao->query($sql);
if ($result->num_rows !== 1) {
  echo "<p>Produto não encontrado.</p>";
  include '../../components/footer.php';
  exit;
}
$produto = $result->fetch_assoc();
?>

<h2>Editar Produto</h2>
<form method="post">
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Descrição</label>
    <input type="text" name="descricao" value="<?= htmlspecialchars($produto['descricao']) ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Quantidade</label>
    <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Preço</label>
    <input type="number" step="0.01" name="preco" value="<?= $produto['preco'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Categoria</label>
    <input type="text" name="categoria" value="<?= htmlspecialchars($produto['categoria']) ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Estoque Mínimo</label>
    <input type="number" name="estoque_minimo" value="<?= $produto['estoque_minimo'] ?>" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<p class="mt-3"><a href="produto_list.php" class="btn btn-secondary">Voltar</a></p>  

<?php include '../../components/footer.php'; ?>
