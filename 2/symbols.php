<?php
$inputString = $_POST["commands"];


function symbolsExchange($input) {
    $changesCount = 0;
    for ($i = 0; $i < strlen($input); $i++) {
        switch ($input[$i]) {
            case "h":
                $changesCount++;
                yield ["4", $changesCount];
                break;
            case "l":
                $changesCount++;
                yield ["1", $changesCount];
                break;
            case "e":
                $changesCount++;
                yield ["3", $changesCount];
                break;
            case "o":
                $changesCount++;
                yield ["0", $changesCount];
                break;
            default:
                yield [$input[$i], $changesCount];
                break;
        }
    }
}

function doChange($input) {
    $outputString = "";
    $lastElem;
    foreach (symbolsExchange($input) as $elem) {
        $outputString = $outputString . $elem[0];
        $lastElem = $elem;
    }
    return [$outputString, $lastElem[1]];
}

echo "<p>" . doChange($inputString)[0] . "</p>";