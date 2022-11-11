<?php
function isValid($card){
    $paymentSystem = ["4" => "VISA","5"=>"Mastercard ","220"=>"MIR"];

    $card = str_replace(' ','',$card);
    $arr = array();
    for($i = 0; $i < strlen($card); $i++){
        $arr[$i] = (int)($card[$i]);
    }
    for($j = 0; $j < count($arr); $j+=2){
        $arr[$j]*= 2;
        if($arr[$j] >= 10){
            $arr[$j] = $arr[$j] % 10 + intdiv($arr[$j],10);
        }
    }
    if(array_key_exists($card[0],$paymentSystem)){
        $paymentSystem = $paymentSystem[$card[0]];
    }
    elseif(array_key_exists(substr($card,0,3),$paymentSystem)){
        $paymentSystem = $paymentSystem[substr($card,0,3)];
    }
    else{
        $paymentSystem = "UNKNOWN";
    }
    $isvalid = (array_sum($arr) % 10 == 0) ? "true" : "false";
    return ["isValid" => $isvalid, "paymentSystem"=> $paymentSystem];

}
$numberOfCard = readline("Введите номер карты:");

print_r(isValid($numberOfCard));

?>
