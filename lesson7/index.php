<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    .cart {
        margin: 10px 10px 10px 10px;
        outline: #ede3e3 solid 1px;
        width: 500px;
    }
    .product-list {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }
    .product {
        display: flex;
        flex-direction: column;
        outline: #ede3e3 solid 1px;
        width: 245px;
        align-items: center;
        margin: 0 10px 10px 10px;
    }
</style>
<body>


<?php

session_start();

require_once 'db.php';

if (isset($_POST['logout'])) {
    logout();
}

if (($_COOKIE['login'] == 1) || isset($_SESSION['user'])) {
    showGreetingForm();
} else {
    loginForm();
}

?>


<div class="cart">
    <label>Корзина</label>
<?php cartList();?>
</div>


<div class="product-list">
<?php
$result = getAllProducts($connect);
displayProducts($result);
?>
</div>




<?php

function getAllProducts($connect)
{
    $query = "SELECT * FROM products ORDER BY id DESC";
    return mysqli_query($connect, $query);
}

function displayProducts($result)
{
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<form method="post" action="cart.php">';
        echo '<input type="hidden" name="idProduct" value="' . $row['id'] . '">';
        echo '<div class="product"><div>' . $row['name'] . '</div>';
        echo '<img src="https://picsum.photos/200/200?random=' . $row['id'] . '" alt="pic_' . $row['id'] . '">';
        echo '<p> Цена: ' . $row['price'] . '</p>';
        echo '<input type="submit" name="' . $row['id'] . '" value="Купить">';
        echo '</div>';
        echo '</form>';
    }
}

function cartList()
{
    if (count($_SESSION['cart'])) {

        echo '<form method="POST" action="cart.php"><ul>';
        foreach ($_SESSION['cart'] as $cart => $items) {
            echo '<li>' . $items['name'] . ' цена: ' . $items['price'] . ' кол-во: ' . $items['quantity'] . ' шт.';
            echo ' <button type="submit" name="delete_id_product" value = "' . $cart . '">X</button>';
            echo '</li>';
        }
        echo '</ul></form>';
    } else {
        echo '<div>Корзина пока пуста</div>';
    }

}

function loginForm()
{
    echo '<form method="post" action="userAccount.php">
    <div class="auth">
        <label>Логин: <input type="text" name="login"></label>
        <label>Пароль: <input type="password" name="password"></label>
        <label>Запомнить: <input type="checkbox" name="rememberme"></label>
        <label><input type="submit" value="Войти"></label>
        <label><a href="/createUser.php">Регистрация</a></label>
    </div>
    </form>';
}

function showGreetingForm()
{
    echo '<form method="post" action="">
    <div class="auth">
    Здравствуйте, ' . $_SESSION['user']['name'] . '
           <label><button type="submit" name="logout" value="logout">Выйти</button></label>
    </div>
   </form>';
}

function logout()
{
    unset($_COOKIE['login']);
    setcookie('login', null, -1, '/');
    unset($_SESSION['user']);
}

?>

</body>
</html>
