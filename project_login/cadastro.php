<?php
// cadastro.php
session_start();
require_once "config.php";

$nome_usuario = $email = $senha = $confirm_senha = "";
$nome_completo = $idade = $numero_telefone = $endereco = "";
$registro_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Coleta e validação de senhas
    $senha = $_POST['senha']; 
    $confirm_senha = $_POST['confirm_senha']; 

    if($senha !== $confirm_senha || empty($senha)){
        $registro_err = "As senhas não conferem ou estão vazias.";
    }
    
    // Coleta e sanitização de outros campos
    $nome_usuario = trim($_POST['nome_usuario']); 
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $nome_completo = trim($_POST['nome_completo']); 
    $idade = (int) $_POST['idade']; 
    $numero_telefone = trim($_POST['numero_telefone']); 
    $endereco = trim($_POST['endereco']); 

    if(empty($registro_err)){
        $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO usuarios (nome_usuario, email, senha, nome_completo, idade, numero_telefone, endereco) 
                VALUES (:nome_usuario, :email, :senha, :nome_completo, :idade, :numero_telefone, :endereco)";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(':nome_usuario', $nome_usuario, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha_hashed, PDO::PARAM_STR);
            $stmt->bindParam(':nome_completo', $nome_completo, PDO::PARAM_STR);
            $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
            $stmt->bindParam(':numero_telefone', $numero_telefone, PDO::PARAM_STR);
            $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
            
            try {
                $stmt->execute();
                // Redireciona para o login com flag de sucesso
                header("location: index.php?cadastro=sucesso"); 
                exit();
            } catch (PDOException $e) {
                 if ($e->getCode() == '23000') { // Erro de Chave Única/Duplicidade
                     $registro_err = "Erro: Nome de usuário ou Email já cadastrado.";
                } else {
                    $registro_err = "Algo deu errado ao registrar. Tente novamente mais tarde.";
                    // Em produção, você logaria $e->getMessage() em vez de exibi-lo
                }
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css"> 
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <h2>Cadastro</h2>
            <p>Preencha o formulário para criar sua conta e suas informações pessoais.</p>

            <?php 
            if(!empty($registro_err)){
                echo '<div class="alerta alerta-erro">' . $registro_err . '</div>';
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h3>Dados de Acesso</h3>
                <div class="form-group"><label>Nome de Usuário</label><input type="text" name="nome_usuario" required value="<?php echo htmlspecialchars($nome_usuario); ?>"></div>
                <div class="form-group"><label>Email</label><input type="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"></div>
                <div class="form-group"><label>Senha</label><input type="password" name="senha" required></div>
                <div class="form-group"><label>Confirmar Senha</label><input type="password" name="confirm_senha" required></div>
                
                <h3>Informações Pessoais</h3>
                <div class="form-group"><label>Nome Completo</label><input type="text" name="nome_completo" value="<?php echo htmlspecialchars($nome_completo); ?>"></div>
                <div class="form-group"><label>Idade</label><input type="number" name="idade" min="0" value="<?php echo htmlspecialchars($idade); ?>"></div>
                <div class="form-group"><label>Telefone</label><input type="text" name="numero_telefone" value="<?php echo htmlspecialchars($numero_telefone); ?>"></div>
                <div class="form-group"><label>Endereço</label><input type="text" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>"></div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
                <p>Já tem uma conta? <a href="index.php">Faça login</a>.</p>
            </form>
        </div>
    </div>
</body>
</html>