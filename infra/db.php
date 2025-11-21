<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = 'estoque_db';

// Criar banco, se não existir
$conexao_temp = new mysqli($host, $user, $pass);
if ($conexao_temp->connect_error) {
    die("Erro na conexão temporária: " . $conexao_temp->connect_error);
}
$conexao_temp->query("CREATE DATABASE IF NOT EXISTS `$db`");
$conexao_temp->close();

// Conectar ao banco
$conexao = new mysqli($host, $user, $pass, $db);
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de estoque: " . $conexao->connect_error);
}

// Criar tabela produtos
$sql_produtos = "
CREATE TABLE IF NOT EXISTS produtos (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao VARCHAR(255),
    quantidade INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    categoria VARCHAR(50),
    estoque_minimo INT
);
";

// Criar tabela movimentação
$sql_movimento = "
CREATE TABLE IF NOT EXISTS movimento_estoque (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    produto_id INT NOT NULL,
    tipo_movimento ENUM('entrada','saida') NOT NULL,
    quantidade INT NOT NULL,
    data_movimento DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    observacao VARCHAR(255),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);
";

// Criar tabela fornecedores
$sql_fornecedores = "
CREATE TABLE IF NOT EXISTS fornecedores (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100)
);
";

// Executar queries
if (!$conexao->query($sql_produtos)) {
    die("Erro ao criar tabela produtos: " . $conexao->error);
}
if (!$conexao->query($sql_movimento)) {
    die("Erro ao criar tabela movimento_estoque: " . $conexao->error);
}
if (!$conexao->query($sql_fornecedores)) {
    die("Erro ao criar tabela fornecedores: " . $conexao->error);
}

// Conexão permanece aberta para ser usada nas outras páginas
?>
