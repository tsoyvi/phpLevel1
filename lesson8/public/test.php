<?php
echo 'text';
echo var_dump($_REQUEST);
echo var_dump($_POST);
echo var_dump($_GET);

echo var_dump( json_decode(file_get_contents("php://input"), true) );