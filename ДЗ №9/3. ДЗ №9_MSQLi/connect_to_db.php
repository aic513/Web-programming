<?php

$db = new mysqli($ServerName,$UserName,$Password,$Database);
if ($db->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
}
if (!mysqli_select_db($db, $Database)) {
    die('Не удалось выбрать базу данных main_bd');
}
mysqli_query($db, "SET NAMES utf8");
