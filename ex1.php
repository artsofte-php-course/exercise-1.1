<?php

//Shlykova Ksenia

$cardNumber = readline("cardNumber = ");

$number = str_replace(' ', '', $cardNumber);
$number = str_replace('-', '', $number);
$number = (int) $number;

$arrNumber = str_split($number);

for ($i = 0; $i < 16; $i+=2) {
    $arrNumber[$i] = $arrNumber[$i]*2;
    if ($arrNumber[$i]>9)
       $arrNumber[$i]-=9;
}

$answer = ["isValid" => "false", "paymentSystem" => "none"];

if (array_sum($arrNumber)%10===0) {
    $answer["isValid"] = "true";
    if ($cardNumber[0]==4)
       $answer["paymentSystem"] = "VISA";
    elseif ($cardNumber[0]==5)
       $answer["paymentSystem"] = "Mastercard";
    elseif ($cardNumber[0]==2 and $cardNumber[1]==2 and $cardNumber[2]==0)
       $answer["paymentSystem"] = "MIR";
    else
       $answer["paymentSystem"] = "UNKNOWN";
}

print_r($answer);

?>