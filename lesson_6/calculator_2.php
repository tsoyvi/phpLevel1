<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator_V2</title>
</head>
<body>

<?php
/*
Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.
*/

if (isset($_POST['number_1'])) {
    $number_1 = (int) $_POST['number_1'];
} else {
    $number_1 = null;
}

if (isset($_POST['number_2'])) {
    $number_2 = (int) $_POST['number_2'];
} else {
    $number_2 = null;
}

if (isset($_POST['operation'])) {
    $operation = (string) $_POST['operation'];
} else {
    $operation = '+';
}

if ($operation == '/' && $number_2 == 0) {
    $result = 'Деление на ноль';
} else {
    $result = mathOperation($number_1, $number_2, $operation);

}

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

?>

<form action="calculator_2.php" method="post">
<input type="number" name ="number_1" <?php echo 'value="' . $number_1 . '"'; ?> >
<input type="number" name ="number_2" <?php echo 'value="' . $number_2 . '"'; ?> >
<input type="submit" name="operation" value="+">
<input type="submit" name="operation" value="-">
<input type="submit" name="operation" value="*">
<input type="submit" name="operation" value="/">

</form>

<span>= <?php echo $result; ?> </span>

</body>
</html>