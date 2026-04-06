<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de Donates e Subs</title>
    <link rel="stylesheet" href="_css\FiltroDeStreamer.css">
</head>
<body>
    <h1>Calculadora de Recebimentos</h1>

    <div class="formulario">
        <form method="POST">
            <label>Total de Donates (R$):</label>
            <input type="number" step="0.01" name="donates">

            <label>Número de Subs:</label>
            <input type="number" name="subs">

            <label>Plataforma:</label>
            <select name="plataforma">
                <option value="twitch">Twitch (Taxa 50%)</option>
                <option value="youtube">YouTube (Taxa 30%)</option>
            </select>

            <button type="submit" class="btn">Calcular Saldo Limpo</button>
        </form>
    </div>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $donates = $_POST['donates'];
        $subs = $_POST['subs'];
        $plataforma = $_POST['plataforma'];
            
        $valorPorSub = 10.00;
        $valorBrutoSubs = $subs * $valorPorSub;

        if ($plataforma == "twitch") {
            $valorLimpoSubs = $valorBrutoSubs * 0.50;
        } else {
            $valorLimpoSubs = $valorBrutoSubs * 0.70;
        }

        $saldoFinal = $donates + $valorLimpoSubs;

        echo "Saldo Final: R$ " . number_format($saldoFinal, 2, ',', '.') . "<br>";

        if ($saldoFinal < 100) {
            echo "Saldo insuficiente para saque mínimo (R$ 100,00)";
        } else {
            echo "Saldo disponível para saque!";
        }
    }
?>