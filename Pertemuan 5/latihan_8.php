<?php
    $ball = "purple";
    $redbox = "-";
    $yellowbox = "-";
    $bluebox = "-";
    $greenbox = "-";
    $purplebox = "-";
    $colorlessbox = "-";

    //Coba ubah ke "yellow", "blue", "green", "purple", atau warna lain
    if ($ball == "red") {
        $redbox = $ball;
    } elseif ($ball == "yellow") {
        $yellowbox = $ball;
    } elseif ($ball == "blue") {
        $bluebox = $ball;
    } elseif ($ball == "green") {
        $greenbox = $ball;
    } elseif ($ball == "purple") {
        $purplebox = $ball;
    } else {
        $colorlessbox = $ball;
    }

    echo "red box : $redbox \n";
    echo "yellow box : $yellowbox \n";
    echo "blue box : $bluebox \n";
    echo "green box : $greenbox \n";
    echo "purple box : $purplebox \n";
    echo "colorless box : $colorlessbox \n";
?>