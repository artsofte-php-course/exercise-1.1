<?php

$cardNumb = readline("Введите номер карты:");

$number = str_replace(' ', '', $cardNumb);
$number = str_replace('-', '', $number);
$number = (int) $number;

$arrNumb = str_split($number);

for ($i = 0; $i < 16; $i+=2) {
    $arrNumb[$i] = $arrNumb[$i]*2;
    if ($arrNumb[$i]>9)
       $arrNumb[$i]-=9;
}



$answer = ["isValid" => "false", "paymentSystem" => "none"];

if (array_sum($arrNumb)%10===0) {
    $answer["isValid"] = "true";
    if ($cardNumb[0]==4)
       $answer["paymentSystem"] = "VISA";
    elseif ($cardNumb[0]==5)
       $answer["paymentSystem"] = "Mastercard";
    elseif ($cardNumb[0]==2 and $cardNumb[1]==2 and $cardNumb[2]==0)
       $answer["paymentSystem"] = "MIR";
    else
       $answer["paymentSystem"] = "UNKNOWN";
}

print_r($answer);

?>
