<?php
function IsValid($card) {

    for ($i = 0; $i < count($card); $i += 2) {
        $card[$i] *= 2;

        if($card[$i] >= 10) {
            $card[$i] = $card[$i] % 10 + intdiv($card[$i],10);
        }
    }

    $isValid = (array_sum($card) % 10 == 0) ? "true" : "false";

    return ["isValid" => $isValid];

}

function PaymentSystem($card) {

    $paymentSystem = ["4" => "VISA",
    "5"=>"Mastercard ",
    "220"=>"MIR"];

    if (array_key_exists($card[0], $paymentSystem)) {
        $paymentSystem = $paymentSystem[$card[0]];
    }
    elseif (array_key_exists(substr($card, 0, 3), $paymentSystem)){
        $paymentSystem = $paymentSystem[substr($card, 0, 3)];
    }
    else {
        $paymentSystem = "UNKNOWN";
    }

    return ["paymentSystem" => $paymentSystem];
}

$numberCard = readline("Введите номер карты:");

$newNumberCard = str_replace(' ','',$numberCard);
$mas = array();

for ($i = 0; $i < strlen($newNumberCard); $i++) {
    $mas[$i] = (int)($newNumberCard[$i]);
}

print_r(IsValid($mas));
print_r(PaymentSystem($numberCard));
?>