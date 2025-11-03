<?php
// painel.php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";

$nome = $email = $idade = $numero = $endereco = "N/A";

// Busca os dados completos do usuário (PDO com prepared statements)
$sql = "SELECT nome_completo, idade, numero_telefone, endereco, email FROM usuarios WHERE id = :id";

if($stmt = $pdo->prepare($sql)){
    $stmt->bindParam(":id", $_SESSION["id"], PDO::PARAM_INT);

    if($stmt->execute()){
        if($row = $stmt->fetch()){
            $nome = $row["nome_completo"] ?: "Não preenchido";
            $email = $row["email"];
            $idade = $row["idade"] ?: "Não preenchido";
            $numero = $row["numero_telefone"] ?: "Não preenchido";
            $endereco = $row["endereco"] ?: "Não preenchido";
        }
    }
    unset($stmt);
}
unset($pdo);

// Obtém a primeira letra do nome de usuário para o avatar
$inicial = strtoupper(substr($_SESSION["nome_usuario"], 0, 1));
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css"> </head>
<body>
    <header class="header-painel">
        <div class="header-user-info">
            <div class="avatar">
                <?php echo $inicial; ?> 
            </div>
            <h1>Bem vindo, <?php echo htmlspecialchars($_SESSION["nome_usuario"]); ?>!</h1>
        </div>
        
        <div class="header-actions">
            <a href="editar_perfil.php" class="btn btn-secondary">Editar Dados</a>
            
            <a href="logout.php" class="btn btn-danger">Sair da Conta</a>
        </div>
        </header>

    <div class="container">
        <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
            <div class="alerta alerta-sucesso">Dados atualizados com sucesso!</div>
        <?php endif; ?>
        <div class="user-details">
            <h3>Suas Informações de Cadastro</h3>
            <ul>
                <li><strong>Nome Completo:</strong> <?php echo htmlspecialchars($nome); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
                <li><strong>Idade:</strong> <?php echo htmlspecialchars($idade); ?></li>
                <li><strong>Telefone:</strong> <?php echo htmlspecialchars($numero); ?></li>
                <li><strong>Endereço:</strong> <?php echo htmlspecialchars($endereco); ?></li>
            </ul>
        </div>
    </div>
</body>
</html>