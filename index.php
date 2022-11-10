<?php
//Номер карты передается как GET параметр с ключом "cardNumber"
if (isset($_GET["cardNumber"]) && !empty($_GET["cardNumber"])){
    $cardNumber = $_GET["cardNumber"];    
} else {
    exit("card number is unknown");
}

$cardNumber = str_split(str_replace(" ", "", $cardNumber));    
$cardNumber = array_map("intval", $cardNumber);

if (count($cardNumber) != 16)
{
    exit("Not correct card number");
}

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