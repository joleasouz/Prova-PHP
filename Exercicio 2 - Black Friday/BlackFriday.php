<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="_css/blackfriday.css">
</head>
<body>
    <h1>Loja Black Friday</h1>
    
    <div class="formulario">
        <form method="POST">
            <label>Valor da Compra (R$):</label>
            <input type="number" step="0.01" name="valor">

            <label>Código do Cupom:</label>
            <input type="text" name="cupom">

            <button type="submit" class="btn">Calcular Desconto</button>
        </form>
    </div>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $valorB = $_POST['valor'];
        $cupom = strtoupper(trim($_POST['cupom']));

        $desconto = 0;

        if ($valorB > 500) {
            $desconto += $valorB * 0.10;
        }

        if ($cupom == "AMIGAO10") {
            $desconto += 10;
        }

        $valorFinal = $valorB - $desconto;

        echo "Valor Original: R$ " . number_format($valorB, 2, ',', '.') . "<br>";
        echo "Desconto Aplicado: R$ " . number_format($desconto, 2, ',', '.') . "<br>";
        echo "<hr>";
        echo "Valor Final: R$ " . number_format($valorFinal, 2, ',', '.');
    }
?>