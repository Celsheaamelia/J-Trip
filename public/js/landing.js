// =============================================
// J-TRIP Landing Page JavaScript
// =============================================


// ===============================
// NAVBAR SCROLL EFFECT
// ===============================
window.addEventListener('scroll', function () {
    const navbar = document.getElementById('navbar');

    if (window.scrollY > 60) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});


// ===============================
// SMOOTH SCROLL NAV LINKS
// ===============================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;

        const target = document.querySelector(href);
        if (target) {
            e.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});


// ===============================
// HERO SLIDER + PARALLAX
// ===============================
const heroImages = [
    'assets/images/pantai-papuma.jpg',   
    'assets/images/kebun-teh-gambir.jpg',
    'assets/images/air-terjun-tancak.jpg',
];

let currentHero = 0;
const heroBg = document.getElementById("heroBg");

// slider
setInterval(() => {
    currentHero = (currentHero + 1) % heroImages.length;

    heroBg.style.opacity = 0;

    setTimeout(() => {
        heroBg.src = heroImages[currentHero];
        heroBg.style.opacity = 1;
    }, 400);

}, 4000);

// parallax
window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;
    heroBg.style.transform = `translateY(${scrollY * 0.3}px) scale(1.1)`;
});


// ===============================
// ACTIVE NAV SCROLL DETECTION
// ===============================
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    let current = '';

    const scrollY = window.scrollY; // FIX IMPORTANT

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        const sectionHeight = section.clientHeight;

        if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');

        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('active');
        }
    });
});


// ===============================
// SCROLL ANIMATION (FIXED)
// ===============================
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            // kalau mau animasi bisa ulang saat scroll naik turun
            entry.target.classList.remove('show');
        }

    });
}, {
    threshold: 0.15
});


// ===============================
// INIT AFTER DOM READY
// ===============================
window.addEventListener("DOMContentLoaded", () => {

    const animateElements = document.querySelectorAll(
        '.hero-content, .feature-card, .dest-card, .tentang-wrap'
    );

    animateElements.forEach(el => {
        el.classList.add('hidden-anim');
        observer.observe(el);
    });

});


// ===============================
// FORCE REFRESH SCROLL STATE
// ===============================
window.addEventListener('load', () => {
    window.dispatchEvent(new Event('scroll'));
});

document.getElementById('detailDate').addEventListener('click', function () {
    this.showPicker && this.showPicker();
});

