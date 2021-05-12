<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Symbols With Proxy</title>
</head>
<body>

<?php
if (isset($_POST["commands"])) {

    $inputString = $_POST["commands"];

    if (isset($_COOKIE["data"])) {
        $savedString = $_COOKIE["data"];
    } else {
        setcookie("data", $inputString);
        $savedString = false;
    }

    $opts = [
        'http' => [
            'method' => 'POST',
            'content' => ['commands' => $inputString]
        ]
    ];

    if ($savedString) {
        if ($inputString == $savedString) {
            echo file_get_contents('http://localhost:8082/2/symbols.php', false, stream_context_create($opts));
        } else {
            echo 'Fill fields with same data as before.';
        }
    } else {
        echo file_get_contents('http://localhost:8082/2/symbols.php', false, stream_context_create($opts));
    }
}
?>

<form method="POST">
    <textarea name="commands"></textarea>
    <input type="submit" value="Send" />
</form>
</body>
</html>
