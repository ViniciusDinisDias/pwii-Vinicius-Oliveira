<!DOCTYPE html>
<html>
<head>
    <title>Exercicio 1</title> <!-- Título da página -->
</head>
<body>

<h2>Área do trapézio</h2>

<form method="post">
    <!-- Campo para a base maior do trapézio(B) -->
    Base maior (cm): <input type="number" name="base_maior"><br>

    <!-- Campo para a base menor do trapézio(b) -->
    Base menor (cm): <input type="number" name="base_menor"><br>

    <!-- Campo para a altura do trapézio(h) -->
    Altura (cm): <input type="number" name="altura"><br>

    <!-- Botão para calcular a área(cm²) -->
    <input type="submit" value="Calcular área">
</form>

<?php
// Só calcula se o formulário tiver sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os valores digitados, ou usa 0 se o campo estiver vazio
    $base_maior = $_POST["base_maior"] ?? 0;
    $base_menor = $_POST["base_menor"] ?? 0;
    $altura = $_POST["altura"] ?? 0;

    // Calcula a área do trapézio usando a fórmula (B + b) * h / 2
    $area = ($base_maior + $base_menor) * $altura / 2;

    // Exibe o resultado final
    echo "<br>A área do trapézio é: $area cm²";
}
?>

</body>
</html>