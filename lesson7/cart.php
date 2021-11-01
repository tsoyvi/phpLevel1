<?php
header('Refresh: 2; URL=/');
session_start();

//
///////// Вывод ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);
///////////////////////

require_once 'db.php';

$message = '';

if (isset($_POST['idProduct'])) {
    $product = getProductById($connect, $_POST['idProduct']);
    if ($product) {
        $message = addToCart($product);
    } else {
        $message = 'Ошибка: продукт не найден';
    }
}

if (isset($_POST['delete_id_product'])) {
    $message = deleteFromCart($_POST['delete_id_product']);
}

function getProductById($connect, $id)
{
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connect, $query);
    return mysqli_fetch_assoc($result);
}

function addToCart($product)
{
    $productId = $product['id'];

    if (empty($_SESSION['cart'][$productId]['quantity'])) {
        $_SESSION['cart'][$productId] = array("name" => $product['name'], "description" => $product['description'],
            "image" => $product['image'], "price" => $product['price'], "quantity" => 1);
    } else {
        $_SESSION['cart'][$productId]['quantity']++;
    }
    return 'Товар ' . $_SESSION['cart'][$productId]['name'] . ' добавлен в корзину';
}

function deleteFromCart($id)
{
    $productName = $_SESSION['cart'][$id]['name'];
    if ($_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    } else {
        unset($_SESSION['cart'][$id]);
    }

    return 'Товар ' . $productName . ' удален из корзины';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление в корзину</title>
</head>
<body>

<?php
echo $message;
?>


</body>
</html>