<!DOCTYPE html>
<html>
    <head>
        <title>Exercicio 1</title>
    </head>

    <form method="post"> 
    Distancia em (km): <input type="text" name= "distancia">
    Combutível em (litros): <input type="text" name="combustivel">
    <input type="submit" value="calcular">

    <?php
    $distancia= $_POST["distancia"];
    $combustivel= $_POST["combustivel"];-
    $consumoMedio= $distancia/$combustivel;
    echo "O consumo médio do veículo é: $consumoMedio km/l";
    ?>
    </form>
</html>