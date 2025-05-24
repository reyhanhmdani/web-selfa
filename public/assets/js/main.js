(function ($) {
    "use strict";
    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".sticky-top").addClass("shadow-sm").css("top", "0px");
        } else {
            $(".sticky-top").removeClass("shadow-sm").css("top", "-100px");
        }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000,
    });

    // Statistics
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".display-4").forEach(function (el) {
            let count = parseInt(el.getAttribute("data-count"));
            if (count >= 10) {
                el.innerHTML = count + "+";
            }
        });
    });

    // Date and time picker
    $(".date").datetimepicker({
        format: "L",
    });
    $(".time").datetimepicker({
        format: "LT",
    });

    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });

    // Lembaga slider (Swiper)
if (typeof Swiper !== 'undefined') {
    var swiper = new Swiper('.lembaga-slider', {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        speed: 800,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
                centeredSlides: true,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
                centeredSlides: true,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
                centeredSlides: true,
            },
        },
    });
}
})(jQuery);
