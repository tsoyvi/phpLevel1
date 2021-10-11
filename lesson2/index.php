<?php
echo '
1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом. <br><br>';

$a = (int) 4.5;
$b = (int)  - 3;

echo 'a = ' . $a . '; b = ' . $b . ';<br>';

if ($a >= 0 && $b >= 0) {
    echo 'a - b = ' . $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo 'a * b = ' . $a * $b;
} else {
    echo 'a + b = ' . $a + $b;
}

echo '<hr>';

echo '2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15. <br><br>';

$a = 12;

switch ($a) {
    case 0:
        echo 0 . ' ';
    case 1:
        echo 1 . ' ';
    case 2:
        echo 2 . ' ';
    case 3:
        echo 3 . ' ';
    case 4:
        echo 4 . ' ';
    case 5:
        echo 5 . ' ';
    case 6:
        echo 6 . ' ';
    case 7:
        echo 7 . ' ';
    case 8:
        echo 8 . ' ';
    case 9:
        echo 9 . ' ';
    case 10:
        echo 10 . ' ';
    case 11:
        echo 11 . ' ';
    case 12:
        echo 12 . ' ';
    case 13:
        echo 13 . ' ';
    case 14:
        echo 14 . ' ';
    case 15:
        echo 15 . ' ';
        break;
    default:
        echo 'Не верный ввод';
        break;
}

echo '<hr>';

echo '3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.<br><br>';

function summ($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return $a - $b;
}

function multiplication($a, $b)
{
    return $a * $b;
}

function division($a, $b)
{
    return $a / $b;
}

echo 'Сложение ' . summ(6, 4) . '<br>';
echo 'Вычитание ' . subtract(10, 5) . '<br>';
echo 'Умножение ' . multiplication(7, 3) . '<br>';
echo 'Деление ' . division(21, 3) . '<br>';

echo '<hr>';

echo '4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов,
$operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).<br><br>';

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
            return $arg1 + $arg2;
        case '-':
            return $arg1 - $arg2;
        case '*':
            return $arg1 * $arg2;
        case '/':
            return $arg1 / $arg2;
        default:
            return 'Не верный ввод';

    }
}

echo 'Сложение ' . mathOperation(6, 4, '+') . '<br>';
echo 'Вычитание ' . mathOperation(10, 5, '-') . '<br>';
echo 'Умножение ' . mathOperation(7, 3, '*') . '<br>';
echo 'Деление ' . mathOperation(21, 3, '/') . '<br>';

echo '<hr>';

echo '5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.<br><br>';

$currentYear = date('Y');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<footer><?php echo $currentYear; ?></footer>
</body>
</html>

<?php
echo '<hr>';

echo '6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.<br><br>';

function power($val, $pow)
{
    if ($pow == 1) {
        return $val;
    }
    if ($pow != 1) {
        return $val * power($val, $pow - 1);
    }
}

echo 'Степень - 2^8 = ' . power(2, 8);

echo '<hr>';

echo '7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:<br>
22 часа 15 минут<br>
21 час 43 минуты<br><br>';

function getCurrentTimeWords()
{
    $hour = date("H");
    $minutes = date("i");

    switch (true) {
        case ($hour == 1 || $hour == 21):
            $hourStr = 'час';
            break;
        case (($hour >= 2 && $hour <= 4) || ($hour >= 22 && $hour <= 24)):
            $hourStr = 'часа';
            break;
        case (($hour >= 5 && $hour <= 20) || ($hour == 0)):
            $hourStr = 'часов';
            break;
    }

    if (($minutes >= 11) && ($minutes <= 14)) {
        $minutesStr = 'минут';
    } else {
        $temp = $minutes % 10;
        if ($temp == 1) {
            $minutesStr = 'минута';
        }

        if (($temp >= 2) && ($temp <= 4)) {
            $minutesStr = 'минуты';
        }

        if (($temp >= 5) || ($temp == 0)) {
            $minutesStr = 'минут';
        }
    }

    return $hour . ' ' . $hourStr . ' ' . $minutes . ' ' . $minutesStr;
}

echo 'текущее время - ' . getCurrentTimeWords();

echo '<hr>';
?>