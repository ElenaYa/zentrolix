// Обработчик для контактной формы без серверной части
function handleContactForm() {
    // Получаем данные формы
    var name = document.getElementById('name331').value;
    var email = document.getElementById('email11').value;
    var message = document.getElementById('message1').value;
    var gclid = document.getElementById('gclid-field') ? document.getElementById('gclid-field').value : '';
    
    // Простая валидация
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!name || !email || !message) {
        showSuccessPopup(null, 'Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    // Валидация email
    if (!emailRegex.test(email)) {
        showSuccessPopup(null, 'Por favor, ingresa un email válido.');
        return;
    }
    
    // Симуляция отправки (можно заменить на mailto или интеграцию с другим сервисом)
    showSuccessPopup(null, '¡Gracias por tu mensaje! Pronto nos pondremos en contacto contigo.');
    
    // Очищаем форму
    document.getElementById('contact-form1').reset();
}

// Обработчик для формы регистрации в footer (только локально, без серверной части)
function handleNewsletterForm(event) {
    if (event) event.preventDefault();
    var email = event.target.querySelector('input[name="email"]').value;
    if (!email) {
        showSuccessPopup(); // Можно показать поп-ап с просьбой ввести email, если нужно
        return;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showSuccessPopup(); // Можно показать поп-ап с просьбой ввести корректный email, если нужно
        return;
    }
    showSuccessPopup(email);
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
function showSuccessPopup(userEmail, customMessage) {
    // Создаем HTML поп-апа если его еще нет
    var oldPopup = document.getElementById('successPopup');
    if (oldPopup) oldPopup.remove();
    var message = customMessage ||
        '¡Gracias por unirte a <span class="success-popup-highlight">Zentrolix</span>!<br>Tu interés en el gaming en la nube nos ayuda a crear mejor contenido educativo.';
    var features = '';
    if (!customMessage) {
        features = `<ul class="success-popup-features">
            <li><i class="fas fa-gamepad"></i> Acceso a guías exclusivas sobre gaming en la nube</li>
            <li><i class="fas fa-bell"></i> Notificaciones sobre nuevos cursos y contenidos</li>
            <li><i class="fas fa-star"></i> Tips y trucos para optimizar tu experiencia gaming</li>
            <li><i class="fas fa-users"></i> Únete a nuestra comunidad de gamers en Argentina</li>
        </ul>`;
    }
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
                    <h2 class="success-popup-title">${customMessage ? '¡Mensaje enviado!' : '¡Registro Exitoso!'}</h2>
                </div>
                <div class="success-popup-body">
                    <p class="success-popup-message">${message}</p>
                    ${features}
                    <div class="success-popup-actions">
                        <button onclick="closeSuccessPopup()" class="success-popup-btn primary">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', popupHTML);
    
    // Показываем поп-ап с анимацией
    const popup = document.getElementById('successPopup');
    popup.classList.add('active');
    
    // Блокируем скролл страницы
    document.body.style.overflow = 'hidden';
    
    // Автоматически закрываем через 15 секунд
    setTimeout(() => {
        closeSuccessPopup();
    }, 10000);
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