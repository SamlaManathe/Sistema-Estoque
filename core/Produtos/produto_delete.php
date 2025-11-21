<?php
include '../../infra/db.php';
include '../../components/header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  echo "<p>ID não fornecido para deletar.</p>";
} else {
  
  $sql_mov_delete = "DELETE FROM movimento_estoque WHERE produto_id = $id";
  if ($conexao->query($sql_mov_delete)) {
    echo "<p>Movimentação deletada com sucesso!</p>";
  } else {
    echo "<p>Erro ao deletar movimentação: " . $conexao->error . "</p>";
  }


  $sql = "DELETE FROM produtos WHERE id = $id";
  if ($conexao->query($sql)) {
    echo "<p>Produto deletado com sucesso!</p>";
  } else {
    echo "<p>Erro ao deletar produto: " . $conexao->error . "</p>";
  }
}

echo '<p><a href="produto_list.php" class="btn btn-secondary">Voltar</a></p>';
include '../../components/footer.php';
