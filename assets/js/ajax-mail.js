function handleContactForm() {
    var name = document.getElementById('name331').value;
    var email = document.getElementById('email11').value;
    var message = document.getElementById('message1').value;
    var gclid = document.getElementById('gclid-field') ? document.getElementById('gclid-field').value : '';
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!name || !email || !message) {
        showSuccessPopup(null, 'Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    if (!emailRegex.test(email)) {
        showSuccessPopup(null, 'Por favor, ingresa un email válido.');
        return;
    }
    
    showSuccessPopup(null, '¡Gracias por tu mensaje! Pronto nos pondremos en contacto contigo.');
    
    document.getElementById('contact-form1').reset();
}

function handleNewsletterForm(event) {
    if (event) event.preventDefault();
    var email = event.target.querySelector('input[name="email"]').value;
    if (!email) {
        showSuccessPopup(); 
        return;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showSuccessPopup(); 
        return;
    }
    showSuccessPopup(email);
    event.target.querySelector('input[name="email"]').value = '';
}

function handleIndexContactForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email6').value;
    var message = document.getElementById('message').value;
    
    if (!name || !email || !message) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }
    
    alert('¡Gracias por tu comentario! Valoramos tu interés en Zentrolix.');
    
    document.getElementById('contact-form').reset();
}

function showSuccessPopup(userEmail, customMessage) {
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
    
    const popup = document.getElementById('successPopup');
    popup.classList.add('active');
    
    document.body.style.overflow = 'hidden';
    
    setTimeout(() => {
        closeSuccessPopup();
    }, 10000);
}

function closeSuccessPopup() {
    const popup = document.getElementById('successPopup');
    if (popup) {
        popup.classList.remove('active');
            document.body.style.overflow = '';
        
        setTimeout(() => {
            popup.remove();
        }, 300);
    }
}

$(document).ready(function() {
    $('footer form').on('submit', handleNewsletterForm);
    
    $(document).on('click', '.success-popup-overlay', function(e) {
        if (e.target === this) {
            closeSuccessPopup();
        }
    });
    
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSuccessPopup();
        }
    });
});