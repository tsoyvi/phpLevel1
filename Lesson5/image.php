<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image</title>
</head>
<body>


<?php

require_once 'db.php';

$id = $_GET['id'];

if (empty($id)) {
    $id = null;
}

if ($id && is_numeric($id)) {
    updateCountViews($connect, $id);
    $image = requestImage($connect, $id);
    displayBigImage($image);
}

function displayBigImage($image)
{
    echo '<label><img src="images/' . $image['path'] . '" alt="' . $image['path'] . '"><br>
    Название: ' . $image['name'] . '
    <br>Количество просмотров ' . $image['count_views'] . '</label>';
}

function requestImage($connect, $id)
{
    $query = "SELECT * FROM images WHERE id = $id";
    $result = mysqli_query($connect, $query);
    return mysqli_fetch_assoc($result);
}

function updateCountViews($connect, $id)
{
    return mysqli_query($connect, "UPDATE images SET count_views = count_views+1 WHERE id = $id");
}

?>
</body>
</html>
