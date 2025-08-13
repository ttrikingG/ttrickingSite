// Toggle Mobile Menu
function toggleMenu() {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.getElementById('navLinks');

    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
}

// Close mobile menu on link click
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.getElementById('navLinks');
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
    });
});

// Header shadow on scroll
document.addEventListener('scroll', () => {
    const header = document.querySelector('.header');
    if (header) {
        header.style.boxShadow =
            window.scrollY > 50
                ? '0 4px 30px rgba(0, 0, 0, 0.5)'
                : '0 4px 20px rgba(0, 0, 0, 0.3)';
    }
});

// Ripple effect (buttons & nav links)
function addRippleEffect(selector, color = 'rgba(255, 255, 255, 0.3)') {
    document.querySelectorAll(selector).forEach(element => {
        element.addEventListener('click', function (e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = color;
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.pointerEvents = 'none';

            if (getComputedStyle(this).position === 'static') {
                this.style.position = 'relative';
            }

            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });
}
addRippleEffect('button, .nav-links a'); // branco
addRippleEffect('.footer-links a, .social-link', 'rgba(0, 255, 0, 0.3)'); // verde

// Add ripple & fadeInUp animations via <style>
const style = document.createElement('style');
style.textContent = `
@keyframes ripple {
    to {
        transform: scale(2);
        opacity: 0;
    }
}
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}`;
document.head.appendChild(style);

// Back to Top button
const backToTopButton = document.getElementById('backToTop');
if (backToTopButton) {
    window.addEventListener('scroll', () => {
        backToTopButton.classList.toggle('show', window.pageYOffset > 300);
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// Newsletter form (fake handler)
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const input = document.querySelector('.newsletter-input');
        const btn = document.querySelector('.newsletter-btn');
        const originalHTML = btn.innerHTML;

        if (input && btn && input.value) {
            btn.innerHTML = '<i class="fas fa-check"></i>';
            btn.style.background = 'linear-gradient(45deg, #00ff00, #32CD32)';

            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.background = 'linear-gradient(45deg, lime, #32CD32)';
                input.value = '';
            }, 2000);

            console.log('Newsletter signup:', input.value);
        }
    });
}

// Partículas aleatórias no fundo
function createRandomParticle() {
    const particles = document.querySelector('.particles');
    if (!particles) return;

    if (particles.childElementCount >= 50) return; // limite para evitar sobrecarga

    const particle = document.createElement('div');
    particle.className = 'particle';
    particle.style.left = Math.random() * 100 + '%';
    particle.style.width = particle.style.height = (Math.random() * 4 + 2) + 'px';
    particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
    particle.style.opacity = Math.random() * 0.1 + 0.05;
    particles.appendChild(particle);

    setTimeout(() => particle.remove(), 15000);
}
setInterval(createRandomParticle, 3000);

// Intersection Observer para animações
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
        }
    });
}, observerOptions);

// Observar seções do footer
document.querySelectorAll('.footer-section, .footer-brand').forEach(section => {
    observer.observe(section);
});
