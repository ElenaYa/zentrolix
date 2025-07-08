// Обработчик для контактной формы без серверной части
function handleContactForm() {
    // Получаем данные формы
    var name = document.getElementById('name331').value;
    var email = document.getElementById('email11').value;
    var message = document.getElementById('message1').value;
    
    // Простая валидация
    if (!name || !email || !message) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    // Валидация email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }
    
    // Симуляция отправки (можно заменить на mailto или интеграцию с другим сервисом)
    alert('¡Gracias por tu interés en Zentrolix! Tu mensaje ha sido recibido. Te contactaremos pronto a: ' + email);
    
    // Очищаем форму
    document.getElementById('contact-form1').reset();
}

// Обработчик для формы регистрации в footer
function handleNewsletterForm(event) {
    if (event) event.preventDefault();
    
    var email = event.target.querySelector('input[name="email"]').value;
    
    if (!email) {
        alert('Por favor, ingresa tu email.');
        return;
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }
    
    alert('¡Gracias por registrarte en Zentrolix! Te mantendremos informado sobre gaming en la nube.');
    event.target.querySelector('input[name="email"]').value = '';
}

// Обработчик для формы комментариев на главной странице
function handleIndexContactForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email6').value;
    var message = document.getElementById('message').value;
    
    // Простая валидация
    if (!name || !email || !message) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    // Валидация email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }
    
    alert('¡Gracias por tu comentario! Valoramos tu interés en Zentrolix.');
    
    // Очищаем форму
    document.getElementById('contact-form').reset();
}

// Функция показа поп-апа успешной регистрации
function showSuccessPopup(userEmail) {
    // Создаем HTML поп-апа если его еще нет
    if (!document.getElementById('successPopup')) {
        const popupHTML = `
            <div id="successPopup" class="success-popup-overlay">
                <div class="success-popup-container">
                    <div class="success-popup-header">
                        <button class="success-popup-close" onclick="closeSuccessPopup()">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="success-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h2 class="success-popup-title">¡Registro Exitoso!</h2>
                    </div>
                    <div class="success-popup-body">
                        <p class="success-popup-message">
                            ¡Gracias por unirte a <span class="success-popup-highlight">Zentrolix</span>! 
                            Tu interés en el gaming en la nube nos ayuda a crear mejor contenido educativo.
                        </p>
                        <ul class="success-popup-features">
                            <li><i class="fas fa-gamepad"></i> Acceso a guías exclusivas sobre gaming en la nube</li>
                            <li><i class="fas fa-bell"></i> Notificaciones sobre nuevos cursos y contenidos</li>
                            <li><i class="fas fa-star"></i> Tips y trucos para optimizar tu experiencia gaming</li>
                            <li><i class="fas fa-users"></i> Únete a nuestra comunidad de gamers en Argentina</li>
                        </ul>
                        <div class="success-popup-actions">
                            <a href="service.html" class="success-popup-btn primary">
                                <i class="fas fa-graduation-cap"></i>
                                Ver Cursos
                            </a>
                            <button onclick="closeSuccessPopup()" class="success-popup-btn secondary">
                                <i class="fas fa-home"></i>
                                Continuar Navegando
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', popupHTML);
    }
    
    // Показываем поп-ап с анимацией
    const popup = document.getElementById('successPopup');
    popup.classList.add('active');
    
    // Блокируем скролл страницы
    document.body.style.overflow = 'hidden';
    
    // Автоматически закрываем через 15 секунд
    setTimeout(() => {
        closeSuccessPopup();
    }, 15000);
}

// Функция закрытия поп-апа
function closeSuccessPopup() {
    const popup = document.getElementById('successPopup');
    if (popup) {
        popup.classList.remove('active');
        // Возвращаем скролл страницы
        document.body.style.overflow = '';
        
        // Удаляем поп-ап через время анимации
        setTimeout(() => {
            popup.remove();
        }, 300);
    }
}

// Обновляем существующие обработчики для показа поп-апа
function handleContactForm() {
    // Получаем данные формы
    var name = document.getElementById('name331').value;
    var email = document.getElementById('email11').value;
    var message = document.getElementById('message1').value;
    
    // Простая валидация
    if (!name || !email || !message) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    // Валидация email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }
    
    // Показываем поп-ап вместо простого alert
    showSuccessPopup(email);
    
    // Очищаем форму
    document.getElementById('contact-form1').reset();
}

// Обработчик для формы регистрации в footer (обновлен для поп-апа)
function handleNewsletterForm(event) {
    if (event) event.preventDefault();
    
    var email = event.target.querySelector('input[name="email"]').value;
    
    if (!email) {
        alert('Por favor, ingresa tu email.');
        return;
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }
    
    // Показываем поп-ап вместо простого alert
    showSuccessPopup(email);
    event.target.querySelector('input[name="email"]').value = '';
}

// Обработчик для формы комментариев на главной странице (обновлен)
function handleIndexContactForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email6').value;
    var message = document.getElementById('message').value;
    
    // Простая валидация
    if (!name || !email || !message) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    // Валидация email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }
    
    // Показываем поп-ап
    showSuccessPopup(email);
    
    // Очищаем форму
    document.getElementById('contact-form').reset();
}

// Инициализация обработчиков при загрузке страницы
$(document).ready(function() {
    // Обработчик для всех форм newsletter в footer
    $('footer form').on('submit', handleNewsletterForm);
    
    // Закрытие поп-апа по клику вне его области
    $(document).on('click', '.success-popup-overlay', function(e) {
        if (e.target === this) {
            closeSuccessPopup();
        }
    });
    
    // Закрытие поп-апа по нажатию Escape
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSuccessPopup();
        }
    });
});