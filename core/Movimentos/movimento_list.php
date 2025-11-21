<?php
include '../../infra/db.php';
include '../../components/header.php';

$sql = "
  SELECT m.id, m.tipo_movimento, m.quantidade, m.data_movimento, m.observacao,
         p.nome AS produto_nome
  FROM movimento_estoque m
  JOIN produtos p ON m.produto_id = p.id
  ORDER BY m.data_movimento DESC
";
$result = $conexao->query($sql);
?>

<h2>Movimentações</h2>
<p><a href="movimento_create.php" class="btn btn-success">Nova Movimentação</a></p>

<?php if ($result->num_rows > 0): ?>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th><th>Produto</th><th>Tipo</th><th>Quantidade</th><th>Data</th><th>Obs</th><th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['produto_nome']) ?></td>
          <td>
            <?php 
              $tipo = strtolower($row['tipo_movimento']);
              if ($tipo === 'entrada') {
                echo 'Entrada';
              } elseif ($tipo === 'saida') {
                echo 'Saída';
              } else {
                echo htmlspecialchars($row['tipo_movimento']);
              }
            ?>
          </td>
          <td><?= $row['quantidade'] ?></td>
          <td><?= $row['data_movimento'] ?></td>
          <td><?= htmlspecialchars($row['observacao']) ?></td>
          <td>
            <a href="movimento_delete.php?id=<?= $row['id'] ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Tem certeza que deseja excluir essa movimentação?');">
              Excluir
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>Nenhuma movimentação registrada.</p>
<?php endif; ?>

<p><a href="../../index.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>
