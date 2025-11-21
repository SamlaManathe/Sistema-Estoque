<?php
include '../../infra/db.php';
include '../../components/header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  echo "<p>ID do produto não fornecido.</p>";
  include '../../components/footer.php';
  exit;
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

<h2>Detalhes do Produto</h2>
<ul class="list-group">
  <li class="list-group-item"><strong>ID:</strong> <?= $produto['id'] ?></li>
  <li class="list-group-item"><strong>Nome:</strong> <?= htmlspecialchars($produto['nome']) ?></li>
  <li class="list-group-item"><strong>Descrição:</strong> <?= htmlspecialchars($produto['descricao']) ?></li>
  <li class="list-group-item"><strong>Quantidade:</strong> <?= $produto['quantidade'] ?></li>
  <li class="list-group-item"><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></li>
  <li class="list-group-item"><strong>Categoria:</strong> <?= htmlspecialchars($produto['categoria']) ?></li>
  <li class="list-group-item"><strong>Estoque Mínimo:</strong> <?= $produto['estoque_minimo'] ?></li>
</ul>
<p class="mt-3"><a href="produto_list.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>
