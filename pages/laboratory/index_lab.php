<?php
//session_start();
//require_once '../dbconnect.php';

// Проверяем, авторизован ли пользователь
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаборатория</title>
    <link rel="stylesheet" href="../../CSS/header.css"> <!-- Подключение стилей для шапки -->
    <link rel="stylesheet" href="../../CSS/footer.css"> <!-- Подключение стилей для подвала -->
    <link rel="stylesheet" href="../laboratory/laboratory.css"> <!-- Подключаем стили для страницы лаборатории -->
</head>
<body>
    <?php include '../../includes/header.php'; ?>

    <div class="lab-container">
        <h1 class="lab-container__title">Работа с диаграммами</h1>
        
        <!-- Инструкции -->
        <div class="lab-instructions">
            <h3 class="lab-instructions__heading">Как сохранить диаграмму:</h3>
            <ol class="lab-instructions__list">
                <li class="lab-instructions__item">Нажмите кнопку "Открыть draw.io"</li>
                <li class="lab-instructions__item">Создайте диаграмму</li>
                <li class="lab-instructions__item">В draw.io выберите File → Save As → Device</li>
                <li class="lab-instructions__item">Сохраните файл в формате .drawio</li>
                <li class="lab-instructions__item">Загрузите сохранённый файл через форму ниже</li>
            </ol>
        </div>

        <!-- Кнопка для перехода в draw.io -->
        <a href="https://app.diagrams.net/" target="_blank" class="lab-button">Открыть draw.io</a>

        <div class="lab-upload-form">
            <h2 class="lab-upload-form__title">Загрузить диаграмму</h2>
            <p class="lab-upload-form__description">Загрузите файл в формате .drawio:</p>
            
            <form action="laboratory/upload_diagram.php" method="post" enctype="multipart/form-data" class="lab-upload-form__form">
                <input type="file" name="diagramFile" accept=".drawio" required class="lab-upload-form__input">
                <br><br>
                <input type="submit" value="Загрузить" class="lab-button">
            </form>
        </div>

        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] === 'success') {
                echo '<div class="lab-status lab-status--success">Диаграмма успешно загружена!</div>';
            } elseif ($_GET['status'] === 'error') {
                echo '<div class="lab-status lab-status--error">Ошибка: ' . htmlspecialchars($_GET['message']) . '</div>';
            }
        }
        ?>
    </div>

    <?php include '../../includes/footer.php'; ?>
</body>
</html>