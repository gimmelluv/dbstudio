<?php
session_start();
require_once '../../dbconnect.php'; // Подключение к базе данных

// Получаем диаграммы пользователя из базы данных
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM diagrams WHERE user_id = ?");
$stmt->execute([$user_id]);

// Получаем результаты
$diagrams = [];
$result = $stmt->get_result(); // Получаем результат выполнения запроса
while ($row = $result->fetch_assoc()) { // Извлекаем строки результата
    $diagrams[] = $row; // Добавляем каждую строку в массив
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаборатория</title>
    <link rel="stylesheet" href="../../CSS/header.css"> <!-- Подключаем стили для шапки -->
    <link rel="stylesheet" href="../../CSS/footer.css"> <!-- Подключаем стили для подвала -->
    <link rel="stylesheet" href="../../CSS/modal_register.css">
    <link rel="stylesheet" href="../../CSS/laboratory.css"> <!-- Подключаем стили для страницы лаборатории -->
    <script src="../../JS/script_modal.js" defer></script>
</head>
<body>
    <?php include '../../includes/header.php'; ?> <!-- Подключение шапки -->

    <div class="lab-container">
        <h1 class="lab-container__title">Работа с диаграммами</h1>
        
        <!-- Отображение папок с заданиями -->
        <div class="lab-assignments">
            <h2 class="lab-assignments__title">Ваши диаграммы:</h2>
            <ul class="lab-assignments__list">
                <?php if ($diagrams): ?>
                    <?php foreach ($diagrams as $diagram): ?>
                        <li class="lab-assignments__item">
                            <a href="path_to_diagram_view.php?id=<?php echo $diagram['id']; ?>" class="lab-assignments__link">
                                <?php echo htmlspecialchars($diagram['name']); ?> <!-- Имя диаграммы -->
                            </a>
                            <p class="lab-assignments__comment"><?php echo htmlspecialchars($diagram['comment']); ?></p> <!-- Комментарий к диаграмме -->
                            <p class="lab-assignments__date">Создано: <?php echo date('d-m-Y H:i', strtotime($diagram['created_at'])); ?></p> <!-- Дата создания -->
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="lab-assignments__item">У вас нет загруженных диаграмм.</li>
                <?php endif; ?>
            </ul>
        </div>


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

    <?php include '../../includes/footer.php'; ?> <!-- Подключение подвала -->
</body>
</html>