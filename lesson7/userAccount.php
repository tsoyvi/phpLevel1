<?php

session_start();
require_once 'db.php';
$message = '';
userAuthentication($connect);

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
<?php

//
///////// Вывод ошибок
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
///////////////////////

function userAuthentication($connect)
{
    $user = requestUserDB($connect, $_POST['login']);
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;

        if (isset($_POST['rememberme'])) {
            setcookie('login', 1);
        }

        userShow($user);
    } else {
        echo 'Не верный логи или пароль <br>';
        echo '<a href="index.php"> Перейти к покупкам</a>';
    }

}

function requestUserDB($connect, $login)
{
    $login = mysqli_real_escape_string($connect, $login);
    $query = sprintf("SELECT * FROM users WHERE login ='%s' LIMIT 1;", $login);
    $result = mysqli_query($connect, $query);
    return mysqli_fetch_assoc($result);
}

function userShow($user)
{
    echo 'Здравствуйте!<br>';
    echo $user['name'] . '<br>';
    echo $user['login'] . '<br>';
    echo '<a href="index.php"> Перейти к покупкам</a>';
}

?>

</body>
</html>