function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

$(function() {

    $('.section_3 .dish:nth-child(odd)').addClass('reveal_origin_left');
    $('.section_3 .dish:nth-child(even)').addClass('reveal_origin_right');
    window.sr = ScrollReveal();
    sr.reveal('.reveal_origin_top', {
        origin: 'top',
        distance: '100px',
        duration: 1000
    });
    sr.reveal('.reveal_origin_bottom', {
        origin: 'bottom',
        distance: '100px',
        duration: 1000
    });
    sr.reveal('.reveal_origin_left', {
        origin: 'left',
        distance: '500px',
        duration: 1000
    });
    sr.reveal('.reveal_origin_right', {
        origin: 'right',
        distance: '500px',
        duration: 1000
    });
    sr.reveal('.reveal_scale', {
        scale: 0.1,
        duration: 1000
    });
    $('.header .navbar_show').click(function() {
        $('.header .navbar_show').hide();
        setTimeout(function() {
            $('.header .navbar_hide').show();
        }, 500);
        $('.header .wrap').css({
            maxHeight: "none"
        });
        if ($(window).width() <= 767) {
            WindowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            if (WindowHeight < $('.header .wrap').height()) {
                $('.header .wrap').css({
                    maxHeight: WindowHeight
                });
            }
        }
        $('.header .wrap').slideDown(500);
    });

    if ($(window).width() < 767) {
        $('.header a').on('click', function() {
            $('.header .navbar_hide').hide();
            setTimeout(function() {
                $('.header .navbar_show').show();
            }, 500);
            $('.header .wrap').slideUp(500);
        });
    }


    $('.header .navbar_hide').click(function() {
        $('.header .navbar_hide').hide();
        setTimeout(function() {
            $('.header .navbar_show').show();
        }, 500);
        $('.header .wrap').slideUp(500);
    });
    $(window).resize(function() {
        $('.header .navbar_show').show();
        $('.header .navbar_hide').hide();
        $('.header .wrap').hide();
        if ($(window).width() > 767) {
            $('.header .wrap').show();
        }
    });
    $('.div_link').click(function() {
        if ($(window).width() <= 767) {
            $('.header .navbar_show').show();
            $('.header .navbar_hide').hide();
            $('.header .wrap').hide();
        }
    });

    function LinkScrollResize() {
        if ($(window).width() > 767) {
            LinkScroll = $(".header").height();
            LinkScroll2 = $(".header").height();
        } else {
            LinkScroll = 10;
            LinkScroll2 = 0;
        }
    }
    LinkScrollResize();
    $('.popup-gallery .photo_lick').mouseover(function() {
        $(this).find('.photo_lick_hover').show();
    });
    $('.popup-gallery .photo_lick').mouseleave(function() {
        $(this).find('.photo_lick_hover').hide();
    });

    function GalleryshowSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var text = document.getElementsByClassName("text");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            GalleryslideIndex = 1
        }
        if (n < 1) {
            GalleryslideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[GalleryslideIndex - 1].style.display = "block";
        captionText.innerHTML = text[GalleryslideIndex - 1].textContent;
    }
    $('.popup-gallery .photo_lick').click(function() {
        document.getElementById('myModal').style.display = "block";
        currentSlide(parseInt($(this).attr('data-name')));
    });
    $('.popup-gallery .close').click(function() {
        document.getElementById('myModal').style.display = "none";
    });

    function plusSlides(n) {
        GalleryslideIndex += n;
        GalleryshowSlides(GalleryslideIndex);
    }

    function currentSlide(n) {
        GalleryshowSlides(GalleryslideIndex = n);
    }
    $('.popup-gallery .prev').click(function() {
        plusSlides(-1);
    });
    $('.popup-gallery .next').click(function() {
        plusSlides(1);
    });

    function sliderResize() {
        if ($(window).width() > 767) {
            articlesSlider = $('.article_slider').bxSlider({
                minSlides: 2,
                maxSlides: 2
            });
        } else {
            articlesSlider = $('.article_slider').bxSlider({
                minSlides: 1,
                maxSlides: 1
            });
        }
    }
    sliderResize();
    $(window).resize(function() {
        sliderResize();
        LinkScrollResize();
    });
    $('.photos_slider').bxSlider({
        auto: true,
        mode: 'fade'
    });
    $('#date_1').datepicker({
        duration: 500,
        showAnim: 'slideDown',
        minDate: '0',
        maxDate: '+3M'
    });
    $('#date_2').datepicker({
        duration: 500,
        showAnim: 'slideDown',
        minDate: '0',
        maxDate: '+3M'
    });
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3C;Пред',
        nextText: 'След&#x3E;',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['В', 'П', 'В', 'С', 'Ч', 'П', 'С'],
        weekHeader: 'Нед',
        dateFormat: 'dd M yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.regional['en'] = {
        CloseText: 'close',
        PrevText: '&#x3C;Prev',
        NextText: 'Next&#x3E;',
        CurrentText: 'Today',
        MonthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
        MonthNamesShort: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
        DayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        DayNamesShort: ['wsk', 'td', 'tf', 'srd', 'wht', 'ftn', 'sbt'],
        DayNamesMin: ['B', 'P', 'B', 'C', 'H', 'P', 'C'],
        WeekHeader: 'Ned',
        dateFormat: 'dd M yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    var lang = getUrlVars()["lang"];
    if (lang == 'en#' || lang == 'en')
        $.datepicker.setDefaults($.datepicker.regional['en']);
    else
        $.datepicker.setDefaults($.datepicker.regional['ru']);
    $('#date_1').datepicker({
        dateFormat: "dd M yy"
    }).datepicker("setDate", "0");
    $('#date_2').datepicker({
        dateFormat: "dd M yy"
    }).datepicker("setDate", "0");
    $('#obolon select, #saksaganskogo select').niceSelect();
    $('#obolon select, #saksaganskogo select').change(function() {
        thisForm = $(this).parents('form:first');
        time_from = thisForm.find('.time_from').children('option:selected').attr("value");
        time_to = thisForm.find('.time_to').children('option:selected').attr("value");
        if ($(this).hasClass('time_from')) {
            thisForm.find('div.time_to .option').show();
            for (var i = time_from; i > 10; i--) {
                thisForm.find('div.time_to .option[data-value="' + i + '"] ').hide();
            }
        }
        if ($(this).hasClass('time_to')) {
            thisForm.find('div.time_from .option').show();
            for (var i = time_to; i < 22; i++) {
                thisForm.find('div.time_from .option[data-value="' + i + '"] ').hide();
            }
        }
    });
    $('.previously_submit').click(function() {
        thisForm = $(this).parents('form:first');
        thisForm.find('.date_selected').html(thisForm.find('.date').val());
        thisForm.find('.time_selected_from').html(thisForm.find('.time_from').children('option:selected').attr("value") + ":00");
        thisForm.find('.time_selected_to').html(thisForm.find('.time_to').children('option:selected').attr("value") + ":00");
        thisForm.find('.form_part_2').fadeIn(250);
    });
    $('.form_part_close, .form_part_fade').click(function() {
        $('.form_part_2').fadeOut(250);
    });
    $('.section_4 .article_view_close, .section_4 .article_view_fade').click(function() {
        $('.article_view').fadeOut(250);
    });


    // PDF
    // $('.view_all_menu.desktop_up_pdf').click(function() {
    //     $('.all_menu_pop_up').fadeIn(250);
    // });
    // $('.all_menu_pop_up .fade_pop_up, .all_menu_pop_up_wrap .close_black').click(function() {
    //     $('.all_menu_pop_up').fadeOut(250);
    // });




    // $('.phone').mask('+380-99-999-99-99');
    // $('.guests').mask('999');
    // var regName = /[а-яА-ЯёЁa-zA-ZґєіїҐІЇЄ`´ʼ’]/;
    // var regEmail = /[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}/;
    // var regString = /[а-яА-ЯёЁa-zA-ZґєіїҐІЇЄ`´ʼ’0-9]/;

    // function InputKeyup() {
    //     if ($this.hasClass("guests")) {
    //         if ($this.val().length > 0) {
    //             $this.removeClass('incorrect').addClass('correct');
    //         } else {
    //             $this.removeClass('correct').addClass('incorrect');
    //         }
    //     } else if ($this.hasClass("name")) {
    //         if ($this.val().length < 3 || $this.val().search(regName) == -1) {
    //             $this.removeClass('correct').addClass('incorrect');
    //         } else {
    //             $this.removeClass('incorrect').addClass('correct');
    //         }
    //     } else if ($this.hasClass("phone")) {
    //         if ($this.val().length == 17) {
    //             $this.removeClass('incorrect').addClass('correct');
    //         } else {
    //             $this.removeClass('correct').addClass('incorrect');
    //         }
    //     } else if ($this.hasClass("email")) {
    //         if ($this.val().search(regEmail) == -1) {
    //             $this.removeClass('correct').addClass('incorrect');
    //         } else {
    //             $this.removeClass('incorrect').addClass('correct');
    //         }
    //     } else if ($this.hasClass("address") || $this.hasClass("textarea")) {
    //         if ($this.val().search(regString) == -1) {
    //             $this.removeClass('correct').addClass('incorrect');
    //         } else {
    //             $this.removeClass('incorrect').addClass('correct');
    //         }
    //     }
    //     EnterFormValidSubmit();
    // }
    //
    // function EnterFormValidSubmit() {
    //     if ($('#saksaganskogo .guests').hasClass("correct") && $('#saksaganskogo .name').hasClass("correct") && $('#saksaganskogo .phone').hasClass("correct")) {
    //         $("#saksaganskogo .submit").removeClass("incorrect").addClass('correct');
    //     } else {
    //         $("#saksaganskogo .submit").removeClass("correct").addClass("incorrect");
    //     }
    //     if ($('#obolon .guests').hasClass("correct") && $('#obolon .name').hasClass("correct") && $('#obolon .phone').hasClass("correct")) {
    //         $("#obolon .submit").removeClass("incorrect").addClass('correct');
    //     } else {
    //         $("#obolon .submit").removeClass("correct").addClass("incorrect");
    //     }
    //     if ($('.cart_pop_up_wrap .form .name').hasClass("correct") && $('.cart_pop_up_wrap .form .email').hasClass("correct") && $('.cart_pop_up_wrap .form .address').hasClass("correct") && $('.cart_pop_up_wrap .form .textarea').hasClass("correct") && $('.cart_pop_up_wrap .form .phone').hasClass("correct")) {
    //         $(".cart_pop_up_wrap .form .submit").removeClass("incorrect").addClass('correct');
    //     } else {
    //         $(".cart_pop_up_wrap .form .submit").removeClass("correct").addClass("incorrect");
    //     }
    // }
    // $('.form input, .form textarea').keyup(function() {
    //     $this = $(this);
    //     InputKeyup();
    // });
    $('.form input, .form textarea').keydown(function(e) {
        if (e.which == 13) {
            $(this).parents('form:first').find('.submit').click();
        }
    });
    $('.tnx_pop_up .close, .tnx_pop_up .fade_pop_up').click(function() {
        $('.tnx_pop_up').fadeOut();
        clearInterval(SetInterval)
    });
    $('.section_5 .left_wrap').click(function() {
        if (!$(this).hasClass('active')) {
            $('.section_5 .right_wrap').removeClass('active');
            $('.section_5 .left_wrap').addClass('active');
            $('#map_1').fadeIn(250);
            $('#map_2').fadeOut(250);

            $('.info-left').fadeIn(200);
            $('.info-right').fadeOut(200);
        }
    });
    $('.section_5 .right_wrap').click(function() {
        if (!$(this).hasClass('active')) {
            $('.section_5 .left_wrap').removeClass('active');
            $('.section_5 .right_wrap').addClass('active');
            $('#map_2').fadeIn(250);
            $('#map_1').fadeOut(250);

            $('.info-left').fadeOut(200);
            $('.info-right').fadeIn(200);
        }
    });
    $(window).scroll(function() {
        footerHeight = $(".footer").outerHeight();
        WindowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        scrollBottom = $(document).height() - WindowHeight - $(window).scrollTop() - footerHeight;
        if (scrollBottom > 0) {
            $('.delivery_bottom').css({
                position: "fixed",
                bottom: "0"
            });
        } else {
            $('.delivery_bottom').css({
                position: "absolute",
                bottom: footerHeight
            });
        }
    });

    $('.delivery_menu .menu').click(function() {
     if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/iPod/i))) {
     } else {
       if (!$(this).hasClass('active')) {
         $('.delivery_menu .menu').removeClass('active');
         $(this).addClass('active');
         $('.dish_block .dish_menu').removeClass('active');
         var x = $(this).attr('class').split(' ');
         var str = x[1];
         if ($(this).hasClass(str)) {
           $('.dish_block .' + str).addClass('active');
         }
       }
     }
    });

    $('.delivery_menu .menu').on('mouseenter touchstart', function() {
     if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/iPod/i))) {
       if (!$(this).hasClass('active')) {
         $('.delivery_menu .menu').removeClass('active');
         $(this).addClass('active');
         $('.dish_block .dish_menu').removeClass('active');
         var x = $(this).attr('class').split(' ');
         var str = x[1];
         if ($(this).hasClass(str)) {
           $('.dish_block .' + str).addClass('active');
         }
       }
     }
    });

    $('.second_delivery_menu .menu').click(function() {
        if (!$(this).hasClass('active')) {
            thisSecondMenu = $(this).parent();
            thisSecondMenu.find('.menu').removeClass('active');
            $(this).addClass('active');
        }
    });
    $('.dish .dish_size_choose').click(function() {
        if (!$(this).hasClass('active')) {
            dishSize = $(this).parent();
            dishSize.find(".dish_size_choose").removeClass('active');
            $(this).addClass('active');
        }
    });
    $('.cart .cart_button').click(function() {
        $('.order_sent_pop_up').fadeOut();
        $('.cart_pop_up').fadeIn();
    });
    $('.cart_pop_up_wrap .show_form').click(function() {
        $(this).hide();
        $('.cart_pop_up_wrap .cart_pop_up_wrap_dish').hide();
        $('.cart_pop_up_wrap .form').fadeIn();
    });
    $('.cart_pop_up .close, .cart_pop_up .close_button').click(function() {
        $('.cart_pop_up').fadeOut();
        $('.cart_pop_up_wrap .cart_pop_up_wrap_dish, .cart_pop_up_wrap .show_form').show();
        $('.cart_pop_up_wrap .form').hide();
    });
    $('.order_sent_pop_up .close, .order_sent_pop_up .close_button').click(function() {
        $('.order_sent_pop_up').fadeOut();
    });
    $('.cart_dish_cancel').click(function() {
        $(this).parent("div").fadeOut(200);
    });
    $('.second_delivery_menu').find('.active').click();
});

function get_menu_items(cat_id) {
    if (!$(this).hasClass('curent')) {
        $('.section_3 .menu span').removeClass('curent');
        $(this).addClass('curent');
        var data = {
            action: 'get_menu_items',
            cat_id: cat_id
        };
        jQuery.post(myajax.url, data, function(response) {
            $('#dishs').html(response);
        });
    }
}

function add_to_cart(id, div) {
    if (!$(this).hasClass('active')) {
        $('.delivery_bottom').fadeIn();
    }
    var size = $(div).parent().find(".dish_size_choose.active").children(".dish_size_number").html();
    if (size) size += ' см';
    if (!size) {
        size = '';
        $(div).parent().parent().find('input:checked').each(function() {
            var $this = $(this);
            if ($this[0] === $(div).parent().parent().find('input:checked').last()[0]) {
                size += $(this).val();
            } else size += $(this).val() + ', ';
        });
    }
    if (size == '') size = null;
    var data = {
        action: 'add_to_cart',
        post_id: id,
        quantity: 1,
        size: size
    };
    jQuery.post(myajax.url, data, function(response) {
        var needle = JSON.parse(response);
        $('.cart_pop_up_wrap_dish').html(needle.code);
        $('.total_sum_number').html(needle.total);
        $('.item_sum_number').html(needle.total);
        $('.item_number').html(parseInt($('.item_number').html()) + 1);
        $('.cart_dish_cancel').click(function() {
            $(this).parent("div").fadeOut(200);
        });
    });
}

function del_from_cart(id, div) {
    var size = $(div).parent().find('#dish_size_number').html();
    var data = {
        action: 'del_from_cart',
        post_id: id,
        size: size
    };
    jQuery.post(myajax.url, data, function(response) {
        $('.total_sum_number').html(response);
        $('.item_sum_number').html(response);
        $('.item_number').html(parseInt($('.item_number').html()) - parseInt($(div).parent().find('#cnt_items').val()));
    });
}

function plus_minus_add_to_cart(div, post_id) {
    var quantity = parseInt(div.value);
    var size = $(div).parent().parent().find('#dish_size_number').html();
    var data = {
        action: 'change_quantity',
        post_id: post_id,
        size: size,
        new_value: quantity
    };
    jQuery.post(myajax.url, data, function(response) {
        var needle = JSON.parse(response);
        $(div).parent().parent().find(".cart_dish_total_price").html(needle.curr);
        $('.total_sum_number').html(needle.total);
        $('.item_sum_number').html(needle.total);
        $('.item_number').html(needle.quantity);
        console.log(needle.total, needle.quantity, needle.curr, size);
    });
}

function get_subcat(id, div, subcat) {
    var data = {
        action: 'get_subcat',
        post_id: id,
        sub_cat: subcat
    };
    jQuery.post(myajax.url, data, function(response) {
        $(div).parent().parent().find('.dish_wrap').html(response);
        $('.dish .dish_size_choose').click(function() {
            if (!$(this).hasClass('active')) {
                dishSize = $(this).parent();
                dishSize.find(".dish_size_choose").removeClass('active');
                $(this).addClass('active');
            }
        });
    });
}

function send_order() {
    var data = {
        action: 'send_order',
        name: $('#name').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
        address: $('#address').val(),
        comment: $('#textarea').val()
    };
    jQuery.post(myajax.url, data, function(response) {
        $('.cart_pop_up').fadeOut();
        $('.cart_pop_up_wrap .cart_pop_up_wrap_dish, .cart_pop_up_wrap .show_form').show();
        $('.cart_pop_up_wrap .form').hide();
        location.reload(true);
    });
}

function reserved(address, div) {
    var data = {
        action: 'reserved',
        name: $(div).parent().find('.name').val(),
        phone: $(div).parent().find('.phone').val(),
        guests: $(div).parent().find('.guests').val(),
        address: address,
        date: $(div).parent().find('.date_selected').html() + ' ' + $(div).parent().find('.time_selected_from').html() + ' - ' + $(div).parent().find('.time_selected_to').html()
    };
    jQuery.post(myajax.url, data, function(response) {
        $('.form_part_2').fadeOut(250);
    });
}

function get_state(id) {
    var data = {
        action: 'get_states',
        state_id: id
    };
    jQuery.post(myajax.url, data, function(response) {
        $('.article_view_wrap').html(response);
        $('.article_view').fadeIn(250);
        $('.section_4 .article_view_close, .section_4 .article_view_fade').click(function() {
            $('.article_view').fadeOut(250);
        });
    });
}