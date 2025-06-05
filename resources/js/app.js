// Initialize Swiper for partner institutions
const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 20,
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
})

// tombol melayang
// Optional: Add animation effects
document.addEventListener('DOMContentLoaded', function () {
    const floatingBtn = document.querySelector('.floating-content')

    floatingBtn.addEventListener('mouseenter', () => {
        const icon = floatingBtn.querySelector('i')
        if (icon) {
            icon.classList.add('fa-bounce')
        }
    })

    floatingBtn.addEventListener('mouseleave', () => {
        const icon = floatingBtn.querySelector('i')
        if (icon) {
            icon.classList.remove('fa-bounce')
        }
    })
})
// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault()

        const targetId = this.getAttribute('href')
        if (targetId === '#') return

        const targetElement = document.querySelector(targetId)
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
            })
        }
    })
})

// Mobile menu toggle
const mobileMenuButton = document.getElementById('mobile-menu-button')
const mobileMenu = document.getElementById('mobile-menu')

if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden')
    })
}

// Universal dropdown toggle (click-based)
document.querySelectorAll('[data-toggle="dropdown"]').forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.stopPropagation()

        const dropdown = btn.closest('.dropdown')

        // Tutup dropdown lain
        document.querySelectorAll('.dropdown').forEach((el) => {
            if (el !== dropdown) el.classList.remove('open')
        })

        // Toggle dropdown aktif
        dropdown.classList.toggle('open')
    })
})

// Tutup jika klik di luar dropdown
document.addEventListener('click', (e) => {
    if (!e.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown').forEach((el) => el.classList.remove('open'))
    }
})

// count up
$(document).ready(function () {
    $('[data-toggle="counter-up"]').each(function () {
        var $this = $(this)
        var countTo = $this.attr('data-count')

        $this.prop('Counter', 0).animate(
            {
                Counter: countTo,
            },
            {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                    $this.text(Math.ceil(now))
                },
            },
        )
    })
})

// lembaga
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.lembaga-slider', {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.modern-pagination',
            clickable: true,
        },
    })
})

