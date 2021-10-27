<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback.php</title>
</head>
<style>
form{
    display: inline-block;
    text-align: center;
}
.form-text {
    display: flex;
    flex-direction: column;
}
label {
    display: flex;
    justify-content: space-between;
    width: 370px;
    margin-top: 5px;
}
input[type="text"] {
    width: 300px;
}
input[type="submit"] {
    margin-top:5px;
}
textarea {
    height: 150px;
    width: 300px;
    resize: none;
}
.feedback {
    outline: grey solid 1px;
    width: 50%;
}
.name {
    color: grey;
    font-weight: bold;
}
.date {
    color: rgb(172, 169, 169);
    font-style: italic;
}
</style>


<body>



<?php

///////// Вывод ошибок
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
///////////////////////

require_once 'db.php';

if (isset($_POST['name']) && isset($_POST['feedback'])) {
    $result = addFeedback($connect, $_POST['name'], $_POST['feedback']);
    if (!$result) {
        echo 'Ошибка добавления отзыва' , mysqli_error($connect);
        exit;
    }
}

$result = requestAllFeedbacks($connect);
displayFeedbacks($result);

function requestAllFeedbacks($connect)
{
    $query = "SELECT * FROM feedbacks ORDER BY id DESC";
    return mysqli_query($connect, $query);
}

function displayFeedbacks($result)
{
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="feedback"><p class="name">' . $row['name'] . '</p>';
        echo '<p class="date">' . Date('d-M-Y - H:i', strtotime($row['date'])) . '</p>';
        echo '<p>' . $row['feedback'] . '</p></div>';
    }
}

function addFeedback($connect, $name, $feedback)
{
    $name = mysqli_real_escape_string($connect, $name);
    $feedback = mysqli_real_escape_string($connect, $feedback);
    $query = sprintf("INSERT INTO feedbacks  SET name ='%s', feedback ='%s';", $name, $feedback);
    return mysqli_query($connect, $query);
}

?>



<form action="" method="post">
<div class="form-text">
<label>Имя<input type="text" name="name"></label>
<label>Отзыв<textarea name="feedback"></textarea></label>
</div>
<input type="submit" value ="Отправить">
 </form>




</body>
</html>