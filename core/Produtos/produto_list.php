<?php
include '../../infra/db.php';
include '../../components/header.php';

$sql = "SELECT * FROM produtos";
$result = $conexao->query($sql);
?>

<h2>Produtos</h2>
<p><a href="produto_create.php" class="btn btn-success">Cadastrar Novo Produto</a></p>

<?php if ($result->num_rows > 0): ?>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Quantidade em Estoque</th>
        <th>Preço</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['nome']) ?></td>
          <td><?= $row['quantidade'] ?></td>
          <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
          <td>
            <a href="produto_detail.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detalhes</a>
            <a href="produto_update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="produto_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Apagar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>Nenhum produto cadastrado.</p>
<?php endif; ?>

<p class="mt-3"><a href="../../index.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>
