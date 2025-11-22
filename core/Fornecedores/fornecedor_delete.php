<?php
include '../../infra/db.php';
include '../../components/header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  echo "<p>ID não fornecido.</p>";
} else {
  $sql = "DELETE FROM fornecedores WHERE id = $id";
  if ($conexao->query($sql)) {
    echo "<p>Fornecedor excluído com sucesso!</p>";
  } else {
    echo "<p>Erro ao excluir: " . $conexao->error . "</p>";
  }
}

echo '<p><a href="fornecedor_list.php" class="btn btn-secondary">Voltar</a></p>';
include '../../components/footer.php';