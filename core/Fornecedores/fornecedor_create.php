<?php
include '../../infra/db.php';
include '../../components/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];

  $sql = "INSERT INTO fornecedores (nome, telefone, email)
          VALUES ('$nome', '$telefone', '$email')";
  if ($conexao->query($sql)) {
    echo "<p>Fornecedor criado com sucesso!</p>";
  } else {
    echo "<p>Erro ao criar fornecedor: " . $conexao->error . "</p>";
  }
}
?>

<h2>Cadastrar Fornecedor</h2>
<form method="post">
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Telefone</label>
    <input type="text" name="telefone" class="form-control">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<br><p><a href="fornecedor_list.php" class="btn btn-secondary">Voltar</a></p>

<?php include '../../components/footer.php'; ?>