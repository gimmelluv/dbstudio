<!-- /includes/header.php -->

<header class="header-index">
    <div class="header-index__left">
        <div class="header-index__logo">DB STUDIO</div>
        <nav class="header-index__nav">
            <a href="pages/courses/index_course.php" class="header-index__link">Курс</a>
            <a href="pages/laboratory/index_lab.php" class="header-index__link">Лаборатория</a>
        </nav>
    </div>

    <!-- кнопки войти и "Выйти" -->
    <button class="login-btn" id="authButton">
        <?php
        if (isset($_SESSION['user_id'])) {
            // Если пользователь авторизован, показываем кнопку "Выйти"
            echo '<a href="logout.php">Выйти</a>';
        } else {
            // Если пользователь не авторизован, показываем кнопку "Войти"
            echo "Войти";
        }
        ?>
    </button>

    <!-- Модальное окно -->
    <div class="modal" id="authModal">
        <div class="modal-content">
            <!-- Блок авторизации -->
            <div id="loginForm">
                <h2>Авторизация</h2>
                <form action="login.php" method="POST">
                    <input type="text" name="email" placeholder="Введите email" required>
                    <input type="password" name="password" placeholder="Введите пароль" required>
                    <button type="submit">Войти</button>
                </form>
                
                <p class="link" id="switchToRegister">Нет аккаунта? Зарегистрируйтесь.</p>
              </div>
          
              <!-- Блок регистрации -->
              <div id="registerForm" style="display: none;">
                <h2>Регистрация</h2>
                <form action="registration.php" method="POST">
                    <input type="email" name="email" placeholder="Введите email" required>
                    <input type="password" name="password" placeholder="Введите пароль" required>
                    <input type="password" name="confirm_password" placeholder="Повторите пароль" required>
                    <button type="submit">Зарегистрироваться</button>
                </form>
                
                <p class="link" id="switchToLogin">Уже есть аккаунт? Авторизуйтесь.</p>
              </div>
            </div>
          </div>
          <script src="../../JS/script_modal.js" defer></script>
</header>