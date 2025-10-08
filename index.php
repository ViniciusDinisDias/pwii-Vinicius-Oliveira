<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Dados</title>
</head>
<body>
    <h2>Inserir Dados no Banco</h2>
    <form action="inserir.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label for="idade">Idade:</label><br>
        <input type="number" name="idade" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" name="cpf" required><br><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
