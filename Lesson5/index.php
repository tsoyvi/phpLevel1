<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>photo gallery 2</title>
</head>
<style>
 img {
    width: 200px;
    margin: 10px;
    border: 1px solid red;

 }
 a {
   border: 1px solid black;
   display: inline-block;
   margin: 10px;
   text-align: center;
 }
</style>
<body>

<?php

/*
1. Создать галерею изображений, состоящую из двух страниц:
просмотр всех фотографий (уменьшенных копий);
просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность = число кликов по фотографии.
 */

require_once 'db.php';

$result = requestAllImages($connect);

displayImages($result);

function requestAllImages($connect)
{
    $query = "SELECT * FROM images ORDER BY count_views DESC";
    return mysqli_query($connect, $query);
}

function displayImages($result)
{
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a href="image.php?id=' . $row['id'] . '" target="blank">
        <img src="images/' . $row['path'] . '" alt="' . $row['path'] . '"><div> Название: ' . $row['name'] . '</div></a>';
    }
}

?>

<hr>

</body>
</html>
