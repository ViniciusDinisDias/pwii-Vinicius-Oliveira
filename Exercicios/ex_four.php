<!DOCTYPE html>
<html>
<head>
    <title>Exercício 4</title>
    <meta charset="UTF-8">
</head>
<body>
    
    <h2>Cálculo da área de um círculo</h2>

    <!-- Formulário para entrada de dados -->
    <form method="post">
        Raio (cm): <input type="number" name="raio" step="0.01"><br><br>
        <input type="submit" value="Calcular área">
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Converte o valor do campo para número real
        $raio = floatval($_POST["raio"] ?? 0);

        // Define o valor de pi
        $pi = 3.14;

        // Calcula a área: π * r²
        $area = $pi * ($raio * $raio);

        // Exibe o resultado na tela
        echo "<br>A área do círculo é: $area cm²";
    }
    ?>
</body>
</html>
