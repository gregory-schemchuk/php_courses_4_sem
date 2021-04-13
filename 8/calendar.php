<?php
$month = $_POST["month"];

$date = new DateTime("2021-" . $month . "-1");
$step = new DateInterval("P1D");
$number = cal_days_in_month(CAL_GREGORIAN, $month, 2021);
$period = new DatePeriod($date, $step, $number - 1);

foreach ($period as $dateTime) {
    if ($dateTime->format("N") == 1) {
        echo "<br>";
    }
    if ($dateTime -> format("N") == 6 || $dateTime -> format("N") == 7) {
        echo "<p style='color: red; display: inline'>";
    }

    echo ($dateTime -> format("D")) . ": " . ($dateTime -> format("d")) . " ";

    if ($dateTime -> format("N") == 6 || $dateTime -> format("N") == 7) {
        echo "</p>";
    }
}