<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de Frete</title>
    <link rel="stylesheet"  href="_css\calculoFrete.css">
</head>
<body>
    <h1>Logistica Express</h1>

    <div class="formulario">
        <form method="post">
            <label for="name">Distância (km): </label>
            <input type="text" name="distancia">

            <label for="name">Peso (kg): </label>
            <input type="text" name="peso">

            <label for="name">Tipo de envio (Normal ou Expresso): </label>
            <input type="text" name="envio">

            <input class="btn" type="submit">
        </form>
    </div>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $distancia = $_POST['distancia'];
        $peso = $_POST['peso'];
        $tipo = $_POST[strtolower('envio')];

        $valorB = 10;

        $valorB += 0.5*$distancia;

        if($peso > 20){
            $valorB += 30;
        }
        else if ($tipo == "expresso") {
            $valorB *= 1.2;
        }

        echo "<h3>Valor do frete: R$ " . number_format($valorB, 2, ',', '.') . "</h3>";
    }
?>
