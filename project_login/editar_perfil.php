<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
 
require_once "config.php";

$id_usuario = $_SESSION["id"];
$nome_completo = $idade = $numero_telefone = $endereco = $email = "";
$edicao_err = $edicao_msg = "";

// ----------------------------------------------------
// 1. CARREGAR DADOS ATUAIS (GET)
// ----------------------------------------------------
try {
    $stmt = $pdo->prepare("SELECT nome_completo, idade, numero_telefone, endereco, email FROM usuarios WHERE id = :id");
    $stmt->bindParam(":id", $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $dados_atuais = $stmt->fetch();

    if ($dados_atuais) {
        $nome_completo = $dados_atuais['nome_completo'];
        $idade = $dados_atuais['idade'];
        $numero_telefone = $dados_atuais['numero_telefone'];
        $endereco = $dados_atuais['endereco'];
        $email = $dados_atuais['email'];
        // Nota: Nome de usuário (nome_usuario) e Senha são editados separadamente para segurança.
    } else {
        // Redireciona se o ID da sessão não for válido
        header("location: logout.php"); 
        exit;
    }

} catch (PDOException $e) {
    $edicao_err = "Erro ao carregar dados: " . $e->getMessage();
}


// ----------------------------------------------------
// 2. PROCESSAR ATUALIZAÇÃO (POST)
// ----------------------------------------------------
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Coleta e sanitização de campos (Email e Nome de Usuário não são alterados aqui por segurança)
    $novo_nome = trim($_POST['nome_completo']); 
    $nova_idade = (int) $_POST['idade']; 
    $novo_numero = trim($_POST['numero_telefone']); 
    $novo_endereco = trim($_POST['endereco']); 
    
    // Consulta UPDATE com Prepared Statements PDO
    $sql = "UPDATE usuarios SET nome_completo = :nome, idade = :idade, numero_telefone = :numero, endereco = :endereco WHERE id = :id";

    try {
        $stmt_update = $pdo->prepare($sql);
        
        $stmt_update->bindParam(':nome', $novo_nome, PDO::PARAM_STR);
        $stmt_update->bindParam(':idade', $nova_idade, PDO::PARAM_INT);
        $stmt_update->bindParam(':numero', $novo_numero, PDO::PARAM_STR);
        $stmt_update->bindParam(':endereco', $novo_endereco, PDO::PARAM_STR);
        $stmt_update->bindParam(':id', $id_usuario, PDO::PARAM_INT);
        
        if ($stmt_update->execute()) {
            // Sucesso! Redireciona de volta para o painel com uma mensagem de sucesso
            header("location: painel.php?status=sucesso");
            exit();
        } else {
            $edicao_err = "Não foi possível atualizar os dados. Tente novamente.";
        }
    } catch (PDOException $e) {
        $edicao_err = "Erro ao salvar: " . $e->getMessage();
    }
}
unset($pdo);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <style>
        .header-actions {
            display: flex;
            gap: 10px;
        }
        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header class="header-painel">
        <h2>Editar Perfil</h2>
        <a href="painel.php" class="btn btn-secondary">Voltar ao Painel</a>
    </header>

    <div class="container">
        <div class="wrapper">
            <p>Altere os campos que deseja atualizar. Email e Nome de Usuário não podem ser alterados nesta tela.</p>

            <?php 
            if(!empty($edicao_err)){
                echo '<div class="alerta alerta-erro">' . $edicao_err . '</div>';
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h3>Informações Pessoais</h3>
                
                <div class="form-group"><label>Email (Não Editável)</label><input type="email" value="<?php echo htmlspecialchars($email); ?>" disabled></div>

                <div class="form-group"><label>Nome Completo</label><input type="text" name="nome_completo" value="<?php echo htmlspecialchars($nome_completo); ?>"></div>
                <div class="form-group"><label>Idade</label><input type="number" name="idade" min="0" value="<?php echo htmlspecialchars($idade); ?>"></div>
                <div class="form-group"><label>Telefone</label><input type="text" name="numero_telefone" value="<?php echo htmlspecialchars($numero_telefone); ?>"></div>
                <div class="form-group"><label>Endereço</label><input type="text" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>"></div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Salvar Alterações">
                </div>
            </form>
        </div>
    </div>
</body>
</html>