function checkCardNumber($cardNumber) {
    // Преобразование строки номера карты в список целых чисел
    $cardDigits = array_map(function($ch) {
        return intval($ch);
    }, preg_split('//', $cardNumber, -1, PREG_SPLIT_NO_EMPTY));

    // Проверка длины номера карты
    if (count($cardDigits) !== 13 && count($cardDigits) !== 15 && count($cardDigits) !== 16) {
        return ["isValid" => false, "paymentSystem" => "UNKNOWN"];
    }

    // Вычисление новой последовательность чисел в соответствии с алгоритмом
    $newSequence = [];
    for ($i = 0; $i < count($cardDigits); $i++) {
        if ($i % 2 === 0) {
            $newSequence[] = ($cardDigits[$i] * 2) % 9;
        } else {
            $newSequence[] = $cardDigits[$i];
        }
    }

    // Вычисление суммы новой последовательности
    $total = array_sum($newSequence);

    // Проверка на действительность номер карты
    if ($total % 10 === 0) {
       // Определение платежную систему
        if ($cardDigits[0] === 4) {
            $paymentSystem = "VISA";
        } else if ($cardDigits[0] === 5) {
            $paymentSystem = "Mastercard";
        } else if (array_slice($cardDigits, 0, 3) === [2, 2, 0]) {
            $paymentSystem = "MIR";
        } else {
            $paymentSystem = "UNKNOWN";
        }
        return ["isValid" => true, "paymentSystem" => $paymentSystem];
    } else {
        return ["isValid" => false, "paymentSystem" => "UNKNOWN"];
    }
}