<?php
require 'databaseconnect.php';

// Pegando os dados do formulário
$nome = $_POST['nome'] ?? '';
$idade = $_POST['idade'] ?? '';
$cpf = $_POST['cpf'] ?? '';

try {
    $stmt = $pdo->prepare("INSERT INTO dados (nome, Idade, cpf) VALUES (:nome, :idade, :cpf)");
    $stmt->execute([
        ':nome' => $nome,
        ':idade' => $idade,
        ':cpf' => $cpf
    ]);

    echo "Dados inseridos com sucesso! <br><a href='formulario.php'>Voltar</a>";
} catch (PDOException $e) {
    echo "Erro ao inserir: " . $e->getMessage();
}
?>
