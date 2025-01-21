<?php
require_once 'settings.php'; 

if (!isset($servername) || !isset($username) || !isset($password) || !isset($dbname)) {
    die('Ошибка: переменные для подключения не определены');
}


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
} else {
    echo "Подключение успешно!";
}
?>