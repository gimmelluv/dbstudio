// Элементы
const loginBtn = document.querySelector('.login-btn');
const modal = document.getElementById('authModal');
const closeModalBtns = document.querySelectorAll('.close-modal');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const switchToRegister = document.getElementById('switchToRegister');
const switchToLogin = document.getElementById('switchToLogin');

// Открыть модальное окно
loginBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
});

// Закрыть модальное окно
closeModalBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        modal.style.display = 'none';
    });
});

// Переключение на форму регистрации
switchToRegister.addEventListener('click', () => {
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
});

// Переключение на форму авторизации
switchToLogin.addEventListener('click', () => {
    registerForm.style.display = 'none';
    loginForm.style.display = 'block';
});

// Закрытие при клике вне модального окна
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});