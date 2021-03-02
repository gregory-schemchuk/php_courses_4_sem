<?php
$inputString = $_POST["commands"];
$outputString = "";

function symbolsExchange($input) {
    for ($i = 0; $i < strlen($input); $i++) {
        switch ($input[$i]) {
            case "h":
                yield "4";
                break;
            case "l":
                yield "1";
                break;
            case "e":
                yield "3";
                break;
            case "o":
                yield "0";
                break;
            default:
                yield $input[$i];
                break;
        }
    }
}

foreach (symbolsExchange($inputString) as $elem) {
    $outputString = $outputString . $elem;
}

echo "<p>" . $outputString . "</p>";