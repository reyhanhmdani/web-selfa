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

    // DONASI
$(document).ready(function () {
    // Show/hide donation message based on scroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $("#donationMessage").fadeIn("slow");
        } else {
            $("#donationMessage").fadeOut("slow");
            $("#donationMenu").fadeOut("slow"); // Hide menu when message is hidden
        }
    });

    // Toggle donation menu on message click
    $("#donationMessage").click(function (e) {
        e.preventDefault();
        $("#donationMenu").fadeToggle("fast");
    });

    // Close menu when clicking outside
    $(document).click(function (e) {
        if (!$(e.target).closest("#donationMessage, #donationMenu").length) {
            $("#donationMenu").fadeOut("fast");
        }
    });

    // Close menu when a donation item is clicked
    $(".donation-item").click(function () {
        $("#donationMenu").fadeOut("fast");
    });
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
