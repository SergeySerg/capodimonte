$(document).on('click', 'a[href^="#"]', function () {
    //event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top -70
    }, 500);
});