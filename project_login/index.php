<?php
// index.php (Página de Login)
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: painel.php");
    exit;
}
 
require_once "config.php"; // Conexão PDO
// ... [Declaração de variáveis de erro e processamento do POST] ...
$username_email = $senha = "";
$login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username_email = trim($_POST["username_email"]);
    $senha = trim($_POST["senha"]);

    // Validação simples (idealmente, teria validação mais robusta)
    if(empty($username_email) || empty($senha)){
        $login_err = "Preencha todos os campos.";
    }

    if(empty($login_err)){
        // Prepara a instrução SELECT (PDO com prepared statements)
        $sql = "SELECT id, nome_usuario, senha FROM usuarios WHERE nome_usuario = :user_email OR email = :user_email";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":user_email", $username_email, PDO::PARAM_STR);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $row = $stmt->fetch();
                    $hashed_password = $row["senha"];
                    
                    if(password_verify($senha, $hashed_password)){
                        // Senha correta, inicia sessão
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["nome_usuario"] = $row["nome_usuario"];                            
                        
                        header("location: painel.php");
                        exit;
                    } else{
                        $login_err = "Nome de usuário/email ou senha inválidos.";
                    }
                } else{
                    $login_err = "Nome de usuário/email ou senha inválidos.";
                }
            } else{
                $login_err = "Erro interno. Tente novamente mais tarde.";
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
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css"> 
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <h2>Login</h2>
            <?php 
            if(!empty($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso'){
                echo '<div style="color: green; margin-bottom: 15px;">Cadastro realizado com sucesso! Faça login.</div>';
            }
            if(!empty($login_err)){
                echo '<div class="alerta alerta-erro">' . $login_err . '</div>';
            }        
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Email / Nome de Usuário</label>
                    <input type="text" name="username_email" value="<?php echo htmlspecialchars($username_email); ?>" required>
                </div>    
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Entrar">
                </div>
                <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se agora</a>.</p>
            </form>
        </div>
    </div>
</body>
</html>