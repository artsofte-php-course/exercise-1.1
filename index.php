<?php
//Номер карты передается как GET параметр с ключом "cardNumber"
$cardNumber = $_GET["cardNumber"];
$cardNumber = str_split(str_replace(" ", "", $cardNumber));    
$cardNumber = array_map("intval", $cardNumber);

$result = [];

if ($cardNumber[0] === 4){
    $result["paymentSystem"] = "VISA";
} elseif ($cardNumber[0] === 4){
    $result["paymentSystem"] = "Mastercard";
} elseif (implode(array_slice($cardNumber, 0, 3)) == "220"){
    $result["paymentSystem"] = "MIR";
} else{
    $result["paymentSystem"] = "UNKNOWN";
}

for ($i = 0; $i<16; $i = $i+2){
    $cardNumber[$i] = $cardNumber[$i]*2;
    if (intdiv($cardNumber[$i],10) === 1)
        $cardNumber[$i] = $cardNumber[$i]-9;
}

if (array_sum($cardNumber)%10 === 0){
    $result["isValid"] = true;
} else {
    $result["isValid"] = false;
}

var_dump($result);

?>