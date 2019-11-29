$(document).ready(function () {
    $('.lazy').Lazy();

    $('.menu-nav-toggle').on('click', function () {
        $(this).toggleClass('active')
        $('.nav-container').toggleClass('active')
    })

    $('.search-collapse').on('click', function (e) {
        e.preventDefault();
        $('.search-container').addClass('active')
    })

    $('.search-container .dismiss').on('click', function (e) {
        e.preventDefault();
        $('.search-container').removeClass('active')
    })
})