<?php
require_once 'dbconnect.php'; // Подключение к базе данных

// Установи email и пароль для администратора
$email = 'admin@example.com';
$password = password_hash('12345', PASSWORD_DEFAULT); // Хешируем пароль

// Вставляем администратора в базу данных
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
if ($stmt->execute([$email, $password])) {
    echo "Администратор успешно создан!";
} else {
    echo "Ошибка при создании администратора.";
}
?>