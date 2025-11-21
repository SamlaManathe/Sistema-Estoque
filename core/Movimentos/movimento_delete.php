<?php
include '../../infra/db.php';
include '../../components/header.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM movimento_estoque WHERE id = $id";
    if ($conexao->query($sql)) {
        echo "<p>Movimentação deletada com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir movimentação: " . $conexao->error . "</p>";
    }
} else {
    echo "<p>ID da movimentação não fornecido.</p>";
}

echo '<p><a href="movimento_list.php" class="btn btn-secondary">Voltar</a></p>';

include '../../components/footer.php';
?>
