<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>

<style>
    body{
        margin: 0 auto;
        width: 600px;
    }
    .auth {
        display: flex;
        flex-direction: column;
        outline: #ede3e3 solid 1px;
        width: 245px;
        align-items: flex-end;
    }
    .auth > label {
        margin: 2px;
    }
</style>
<body>





<?php

session_start();
// session_unset();

require_once 'db.php';

if (isset($_POST['registration']) && isset($_POST['login']) && isset($_POST['password'])) {

    $result = addUser($connect);
    if ($result) {
        echo 'пользователь создан <br>';
        echo '<a href="index.php"> Перейти к покупкам</a>';
    } else {
        echo 'Ошибка добавления отзыва', mysqli_error($connect);
    }

} else {
    echo '<form method="post" action="">
        <div class="auth">
            <label>Имя: <input type="text" name="name"></label>
            <label>Логин: <input type="text" name="login"></label>
            <label>Пароль: <input type="password" name="password"></label>
            <label><button type="submit" name="registration" value="1">Зарегистрироваться</button></label>
        </div>
    </form>';
}

function addUser($connect)
{
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $login = mysqli_real_escape_string($connect, $_POST['login']);
    $password = password_hash($_POST['password'], null);
    $password = mysqli_real_escape_string($connect, $password);

    $query = sprintf("INSERT INTO users SET name ='%s', login ='%s', password ='%s';", $name, $login, $password);
    return mysqli_query($connect, $query);

}

?>

</body>
</html>
