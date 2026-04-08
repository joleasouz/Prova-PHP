<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de XP - RPG</title>
    <link rel="stylesheet" href="_css\CalculoXP.css">
</head>
<body>
    <h1>Calculador de XP</h1>

        <form method="POST">
            <label>Nível Atual:</label>
            <input type="number" name="nivel" required>

            <label>XP Acumulado:</label>
            <input type="number" name="xpAtual" required>

            <label>Dificuldade da Missão:</label>
            <select name="dificuldade">
                <option value="facil">Fácil</option>
                <option value="media">Média</option>
                <option value="dificil">Difícil</option>
            </select>

            <button type="submit" class="btn">Concluir Missão</button>
        </form>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nivel = $_POST['nivel'];
        $xpAcumulado = $_POST['xpAtual'];
        $dificuldade = $_POST['dificuldade'];

        $xpBase = 100;

        if ($dificuldade == "media") {
            $xpGanho = $xpBase * 1.5;
        } elseif ($dificuldade == "dificil") {
            $xpGanho = $xpBase * 2.0;
        } else {
            $xpGanho = $xpBase;
        
        $novoXP = $xpAcumulado + $xpGanho;

        echo "XP Ganho: " . $xpGanho . "<br>";
        echo "Total de XP: " . $novoXP . "<br>";

        if ($novoXP > 1000) {
            $novoNivel = $nivel + 1;
            echo "PARABÉNS! Você subiu para o nível " . $novoNivel . "!";
        }
        }
    }
?>