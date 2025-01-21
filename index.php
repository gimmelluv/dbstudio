<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="CSS/header.css"> <!-- Подключаем стили для шапки -->
    <link rel="stylesheet" href="CSS/footer.css"> <!-- Подключаем стили для подвала -->
    <link rel="stylesheet" href="CSS/modal_register.css">
</head>
<body>
    <?php include 'includes/header.php'; ?> <!-- Подключение шапки -->

    <main class="main-container">
        <h1 class="main-container__title">Добро пожаловать в DB STUDIO!</h1>
        <p class="main-container__description">Выберите один из доступных курсов или перейдите в лабораторию для практики.</p>
        

    <?php include 'includes/footer.php'; ?> <!-- Подключение подвала -->
</body>
</html>