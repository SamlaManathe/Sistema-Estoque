<?php
include '../../infra/db.php';
include '../../components/header.php';

$produtos = $conexao->query("SELECT id, nome FROM produtos");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $produto_id = (int)$_POST['produto_id'];
    $tipo_post = $_POST['tipo'] ?? '';
    $tipo_normalizado = strtolower(trim($tipo_post));

    if ($tipo_normalizado !== 'entrada' && $tipo_normalizado !== 'saida') {
        $tipo_normalizado = 'entrada';
    }

    $quantidade = (int)$_POST['quantidade'];
    $observacao = $conexao->real_escape_string($_POST['observacao']);

    $sql = "INSERT INTO movimento_estoque (produto_id, tipo_movimento, quantidade, observacao)
            VALUES ($produto_id, '$tipo_normalizado', $quantidade, '$observacao')";

    if ($conexao->query($sql)) {
        if ($tipo_normalizado === 'entrada') {
            $sql2 = "UPDATE produtos SET quantidade = quantidade + $quantidade WHERE id = $produto_id";
        } else {
            $sql2 = "UPDATE produtos SET quantidade = quantidade - $quantidade WHERE id = $produto_id";
        }

        if ($conexao->query($sql2)) {
            echo "<p>Movimentação registrada e estoque atualizado!</p>";
        } else {
            echo "<p>Movimentação registrada, mas falhou ao atualizar o estoque: " . $conexao->error . "</p>";
        }

    } else {
        echo "<p>Erro ao registrar movimentação: " . $conexao->error . "</p>";
    }
}
?>

<h2>Registrar Movimentação de Estoque</h2>
<form method="post">
  <div class="mb-3">
    <label>Produto</label>
    <select name="produto_id" class="form-select" required>
      <?php while ($p = $produtos->fetch_assoc()): ?>
        <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nome']) ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Tipo de Movimento</label>
    <select name="tipo" class="form-select">
      <option value="entrada">Entrada</option>
      <option value="saida">Saída</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Quantidade</label>
    <input type="number" name="quantidade" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Observação</label>
    <input type="text" name="observacao" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Registrar</button>
</form>

<br>
<p><a href="movimento_list.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>
