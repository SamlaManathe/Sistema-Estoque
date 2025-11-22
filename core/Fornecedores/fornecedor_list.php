<?php
include '../../infra/db.php';
include '../../components/header.php';

$sql = "SELECT * FROM fornecedores";
$result = $conexao->query($sql);
?>

<h2>Fornecedores</h2>
<p><a href="fornecedor_create.php" class="btn btn-success">Novo Fornecedor</a></p>

<?php if ($result->num_rows > 0): ?>
  <table class="table">
    <thead><tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th><th>Ações</th></tr></thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['nome']) ?></td>
          <td><?= htmlspecialchars($row['telefone']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td>
            <a href="fornecedor_update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="fornecedor_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>Nenhum fornecedor cadastrado.</p>
<?php endif; ?>

<p><a href="../../index.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>