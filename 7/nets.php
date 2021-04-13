<?php
$siteUrl = $_POST["site"];
$utilType = $_POST["util"];

$siteUrl = escapeshellcmd($siteUrl);

$output = null;
$code = null;

switch ($utilType) {
    case "ping":
        exec("ping " . $siteUrl, $output, $code);

        $output[1] = sapi_windows_cp_conv(sapi_windows_cp_get('oem'), 65001, $output[1]);
        preg_match("/\d+\\.\d+\\.\d+\\.\d+/", $output[1], $matches);
        $ipAddress = $matches[0];

        $output[9] = sapi_windows_cp_conv(sapi_windows_cp_get('oem'), 65001, $output[9]);
        $firstpos = strpos($output[9], '(');
        $secondpos = strpos($output[9], '%');
        $lossPercents = substr($output[9], $firstpos, $secondpos);
        $successPercents = 100 - ctype_digit($lossPercents);

        echo "PING RESULT: <b>" . $ipAddress . "</b> " . $successPercents . "% success.";
        break;
    case "tracert":
        exec("tracert -h 3 " . $siteUrl, $output, $code);

        for ($i = 0; $i < count($output); $i++) {
            $output[$i] = sapi_windows_cp_conv(sapi_windows_cp_get('oem'), 65001, $output[$i]);
            if (preg_match("/\d+\\.\d+\\.\d+\\.\d+/", $output[$i], $matches)) {
                echo $matches[0] . " ";
            }
        }

        break;
}