<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>photo gallery</title>
</head>
<style>
 img {
    width: 200px;
    margin: 10px;
    border: 1px solid red;
 }
 form {
     border: 1px solid black;
     display: inline-block;
 }
</style>
<body>

<?php

/*
1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки
в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке.
Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.
2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями.
Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
 */

function displayImages($folder)
{
    $images = glob($folder . "/*.jpg");
    foreach ($images as $image) {
        echo '<a href="' . $image . '" target="blank"><img src="' . $image . '" alt="' . $image . '"></a>';
    }
}

displayImages('images');

?>


<hr>
<form enctype="multipart/form-data" method="post" action="addImage.php">
   <p>Загрузите ваши фотографии на сервер</p>
   <p>Размер файла не более 1,5 Мб</p>
   <p><input type="file" name="image" multiple accept="image/jpeg"></p>
   <p><input type="submit" value="Отправить"></p>
  </form>

</body>
</html>