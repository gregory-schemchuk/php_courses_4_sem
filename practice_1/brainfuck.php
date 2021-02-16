<?php
$commands = $_POST["commands"];
$inputs = $_POST["inputs"];
$outputAsciis = array();
$currentInputIndex = 0;

$cells = array(255);
$currentCellIndex = 0;

for ($i = 0; $i < strlen($commands); $i++) {
    switch ($commands[$i]) {
        case ">":
            $currentCellIndex++;
            break;
        case "<":
            $currentCellIndex--;
            break;
        case "+":
            $cells[$currentCellIndex]++;
            break;
        case "-":
            $cells[$currentCellIndex]--;
            break;
        case ".":
            array_push($outputAsciis, chr($cells[$currentCellIndex]));
            break;
        case ",":
            $cells[$currentCellIndex] = ord($inputs[$currentInputIndex++]);
            break;
        case "[":
            if ($cells[$currentCellIndex] == 0) {
                $ierarhyCount = 1;
                while ($ierarhyCount > 0) {
                    $i++;
                    if ($commands[$i] == "[") {
                        $ierarhyCount++;
                    }
                    if ($commands[$i] == "]") {
                        $ierarhyCount--;
                    }
                }
            }
            break;
        case "]":
            if ($cells[$currentCellIndex] != 0) {
                $ierarhyCount = 1;
                while ($ierarhyCount > 0) {
                    $i--;
                    if ($commands[$i] == "[") {
                        $ierarhyCount--;
                    }
                    if ($commands[$i] == "]") {
                        $ierarhyCount++;
                    }
                }
            }
            break;
    }
}

$outputString = "";
for ($i = 0; $i < count($outputAsciis); $i++) {
    $outputString = $outputString . $outputAsciis[$i];
}

echo "<p>" . $outputString . "</p>";