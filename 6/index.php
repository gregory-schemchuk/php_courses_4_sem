<?php
$configFile = parse_ini_file('./index.ini', true);
$fileName = $configFile['main']['filename'];
$firstRuleSymb = $configFile['first_rule']['symbol'];
$secondRuleSymb = $configFile['second_rule']['symbol'];
$thirdRuleSymb = $configFile['third_rule']['symbol'];
$uppperRegister = $configFile['first_rule']['upper'];
$doIncrement = $configFile['second_rule']['direction'];
$deleteString = $configFile['third_rule']['delete'];

if ($doIncrement !== '+' && $doIncrement !== '-') {
    die("direction parameter is incorrect");
}

if (file_exists($fileName)) {
    $fd = fopen($fileName, 'r');
} else {
    die("file path is incorrect");
}

while (!feof($fd)) {
    $string = fgets($fd);

    if (strpos($string, $firstRuleSymb) === 0) {
        if ($uppperRegister) {
            $string = strtoupper($string);
        } else {
            $string = strtolower($string);
        }
    }

    if (strpos($string, $secondRuleSymb) === 0) {
        $newString = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            if ($doIncrement == '+') {
                if (ctype_digit($char)) {
                    $char = ($char + 1) % 10;
                }
            } else {
                if (ctype_digit($char)) {
                    $char = $char - 1;
                    if ($char == -1) {
                        $char = 9;
                    }
                }
            }
            $newString = $newString . $char;
        }
        $string = $newString;
    }

    if (strpos($string, $thirdRuleSymb) === 0) {
        $string = str_replace($deleteString, '', $string);
    }

    echo $string . "<br \>";
}
fclose($fd);