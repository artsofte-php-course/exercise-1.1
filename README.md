# Практическое упражнение 1

Реализовать функцию проверки номера кредитной карты с помощью алгоритма Луна.


## Входящий параметр:
Номер кредитной карты в виде строки
Пример:
"4111 1111 1111 1111"

## Выходной параметр:
Флаг что картая является ввалидной и текстовое название платежной системы.
4 – VISA
5 - Mastercard
220 - MIR
Остальные – UNKNOWN

Пример:
[
  "isValid" => true, 
  "paymentSystem" => "VISA"
]


## Описание алгоритма




```
Дан номер карты 4561 2612 1234 5464

1. Формируется новая последовательность чисел в которой:

Нечетные (первая, третья и тп) цифра умножается на 2. 
Если получившееся число двухзначное, то цифры складываются (или вычитается 9).

Четные остаются без изменений. 

2. Числа новой последовательности складываются

3. Если результирующее число получилось кратно 10, то номер карты валидный.


4  5  6  1     2  6  1  2     1  2  3  4     5  4  6  4
8     12       4     2        2     6        10    12
8     3        4     2        2     6        1     3



```
