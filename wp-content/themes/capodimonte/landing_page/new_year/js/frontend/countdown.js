$(window).ready(function() {
    var countDownDate = new Date($('.countdown-p').attr("data-time-left")).getTime();

    var x = setInterval(function() {

        
        var now = new Date().getTime();
        var distance = countDownDate - now;
                
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        if (days < 10) {
            days = "0" + days;
        }

        if (hours < 10) {
            hours = "0" + hours;
        }

        if (minutes < 10) {
            minutes = "0" + minutes;
        }

        if (seconds < 10) {
            seconds = "0" + seconds;
        }

        $('.countdown-p').find('.days-left').text(days);
        $('.countdown-p').find('.hours-left').text(hours);
        $('.countdown-p').find('.minutes-left').text(minutes);
        $('.countdown-p').find('.seconds-left').text(seconds);
          
        if (distance < 0) {
            clearInterval(x);
            $('.countdown-p').find('.days-left').text("00");
            $('.countdown-p').find('.hours-left').text("00");
            $('.countdown-p').find('.minutes-left').text("00");
            $('.countdown-p').find('.seconds-left').text("00");
        }
    }, 1000);
});