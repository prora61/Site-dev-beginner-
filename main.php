<?php
    error_reporting(E_ALL & E_STRICT);
    ini_set('display_errors', '1');
    ini_set('log_errors', '0');
    ini_set('error_log', './');

    echo "<br>";
    $user = "sdf";
    if(isset($user)):
        echo "isset<br>";
        unset($user);
    endif;

    echo "<br>";

    $week = ["mon", "tue", "wend", "thues"];
    foreach ($week as $key => $day) {
        echo "$key:$day<br>";
    }
    echo "<br>";
    
    //Создать цикл выводящий число от 1 до 9 в форме пирамиды (использовать вложенный цикл)
    // 1
    // 22
    // 333
    // 4444
    $massive = range(1,9,1);
    for ($i=0;$i<=count($massive)-1;$i++) {
        for ($k=1; $k <= $i+1; $k++){
            echo $massive[$i];
        } 
        echo "<br>";
    }
    echo "<br>";
?>
