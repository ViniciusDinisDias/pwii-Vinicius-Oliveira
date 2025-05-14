<!DOCTYPE html>
<html>
<head>
    <title>Exercicio 1</title> <!-- Título da página -->
</head>
<body>

<h2>Consumo médio de combustível</h2>

<form method="post"> 
    Distância em (km): <input type="text" name="distancia"><br>
    Combustível em (litros): <input type="text" name="combustivel"><br>
    <input type="submit" value="Calcular">
</form>

<?php
// Verifica se o formulário foi enviado usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os valores digitados, ou usa 0 se o campo estiver vazio
    $distancia = $_POST["distancia"] ?? 0;
    $combustivel = $_POST["combustivel"] ?? 1; // evita divisão por zero

    // Calcula o consumo médio
    $consumoMedio = $distancia / $combustivel;

    // Mostra o resultado
    echo "<br>O consumo médio do veículo é: $consumoMedio km/l";
}
?>

</body>
</html>
