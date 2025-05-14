<!DOCTYPE html>
<html>
<head>
    <title>Exercício 2</title>  <!-- Título da página -->
<body>

<h2>Cálculo do volume da caixa retangular</h2>

<form method="post">
    Comprimento (cm): <input type="number" name="comprimento"><br>
    Largura (cm): <input type="number" name="largura"><br>
    Altura (cm): <input type="number" name="altura"><br>
    <input type="submit" value="Calcular volume">
</form>

<?php
// Só executa o cálculo se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os valores ou usa 0 se não estiverem definidos
    $comprimento = $_POST["comprimento"] ?? 0;
    $largura = $_POST["largura"] ?? 0;
    $altura = $_POST["altura"] ?? 0;

    // Calcula o volume (comprimento × largura × altura)
    $volume = $comprimento * $largura * $altura;

    // Exibe o resultado
    echo "<br>O volume da caixa é: $volume cm³";
}
?>

</body>
</html>
