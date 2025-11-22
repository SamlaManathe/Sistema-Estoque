<?php
include '../../infra/db.php';
include '../../components/header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  echo "<p>ID não informado.</p>";
  include '../../components/footer.php';
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];

  $sql = "UPDATE fornecedores
          SET nome = '$nome',
              telefone = '$telefone',
              email = '$email'
          WHERE id = $id";
  if ($conexao->query($sql)) {
    echo "<p>Fornecedor atualizado com sucesso!</p>";
  } else {
    echo "<p>Erro ao atualizar: " . $conexao->error . "</p>";
  }
}

$sql = "SELECT * FROM fornecedores WHERE id = $id";
$res = $conexao->query($sql);
if ($res->num_rows !== 1) {
  echo "<p>Fornecedor não encontrado.</p>";
  include '../../components/footer.php';
  exit;
}
$fornecedor = $res->fetch_assoc();
?>

<h2>Editar Fornecedor</h2>
<form method="post">
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($fornecedor['nome']) ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Telefone</label>
    <input type="text" name="telefone" value="<?= htmlspecialchars($fornecedor['telefone']) ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($fornecedor['email']) ?>" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<br><p><a href="fornecedor_list.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>