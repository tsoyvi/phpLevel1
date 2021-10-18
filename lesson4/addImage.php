<?php header('Refresh: 2; URL=/index.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveImage</title>
</head>
<body>

<?php

$folderSave = 'images/';
$fileName = $_FILES['image']['name'];
$fileNameArr = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameArr));
$fileSize = $_FILES['image']['size'];

// Доп. защита на тип файла.
if ($fileExtension != 'jpg') {
    echo '<p>Не верный формат файла</p>';
    exit;
}

if ($fileSize > 1572864) {
    echo '<p>Файл слишком большой</p>';
    exit;
}

if (saveFile($folderSave, $fileName)) {
    echo "Изображение было успешно загружено.<br>";
    echo 'Размер файла - ' . round($fileSize / 1024, 2) . ' Кб';
} else {
    echo "Ошибка при загрузке изображения!\n";
}

function saveFile($folderSave, $fileName)
{
    $uploadFile = $folderSave . basename($fileName);
    return move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
}

?>

</body>
</html>



