<?php
$inputString = $_POST["strings"];


$inputStokes = explode("\n", $inputString);

foreach ($inputStokes as $stroke) {
    $words = explode(" ", $stroke);
    shuffle($words);
    $newStroke = implode(" ", $words);
    array_push($inputStokes, $newStroke);
}

$finalStrokesMap = [];

foreach ($inputStokes as $stroke) {
    $finalStrokesMap[explode(" ", $stroke)[1]] = $stroke;
}

ksort($finalStrokesMap);

foreach ($finalStrokesMap as $stroke) {
    echo $stroke . "<br />";
}