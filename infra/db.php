<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = 'sistemaEstoque';
    $conexao_temp = new mysqli($host, $user, $pass);
    $conexao_temp->query("CREATE DATABASE IF NOT EXISTS sistemaEstoque");
    $conexao_temp->close();   
    
    $conexao = new mysqli($host, $user, $pass, $db);
    if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
    $sql = "CREATE TABLE IF NOT EXISTS medicacoes(
        Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(50) NOT NULL,
        quantidade INT NOT NULL,
        preco DECIMAL(10,2) NOT NULL
    )";

    $conexao->query($sql);
?>