<?php
/*
Template Name: Landing New Year
*/
?>
<!doctype html>
<html lang=en>

<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T5KD5P2');</script>
<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php typical_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Ресторан аутентичной итальянской кухни">
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<meta property="og:site_name" content="Capo di Monte">
	<meta property="og:title" content="Capo di Monte">
	<meta property="og:description" content="Capo di Monte">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/logo.jpg">
	<meta property="og:image:width" content="300">
	<meta property="og:image:height" content="100">
	<meta property="og:url" content="http://rhuilithe.ru/capo_di_monte/">
	<meta property="og:type" content="website">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!-- Required meta tags -->
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.2.2.min.js"></script>

    <link rel=stylesheet href="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/css/frontend/bootstrap.min.css">
    <link rel=stylesheet href="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/capo_party/css/style.css">
    <link rel=stylesheet href="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/css/frontend/style.css">
    <link href="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/css/plugins/sweetalert.css" rel=stylesheet>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&amp;subset=cyrillic" rel="stylesheet">
    <title>Capo Di Monte</title>
    <meta name=description content="description content">
    <link rel="icon" type="image/x-icon" href="http://capodimonte.ua/wp-content/themes/capodimonte/images/favicon.ico">
</head>

<body>
    <nav class="navbar navbar-expand-xl navbar-light navbar-shadowed fixed-top navbar-white">
        <button class=navbar-toggler type=button data-toggle=collapse data-target="#navbarSupportedContent" aria-controls=navbarSupportedContent aria-expanded=false aria-label="Toggle navigation">
            <span class=navbar-toggler-icon></span>
        </button>
        <a id=mobile-logo class=mx-auto href="#"><img class=img-fluid src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/logo.png" width=100px></a>
            <div class="collapse navbar-collapse" id=navbarSupportedContent>
                <ul class="navbar-nav mx-auto align-items-center text-center mt-2 mt-xl-0" id=custom-navbar>
                    <li class=nav-item>
                        <a class="nav-link my-1 hover-underline" href="#aboutAnchor">О вечеринке</a>
                    </li>
                    <li class=nav-item>
                        <a class="nav-link my-1 hover-underline" href="#programAnchor">программа</a>
                    </li>
                    <li class="nav-item text-center my-xl-1">
                        <a id=desktop-logo href="/new-year"><img class="img-fluid mx-center" src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/logo.png" width=140px></a>
                    </li>
                    <li class=nav-item>
                        <a class="nav-link my-1 hover-underline" href="#dishesAnchor">меню</a>
                    </li>
                    <li class=nav-item>
                        <a class="nav-link my-1 hover-underline" href="#orderAnchor">бронирование</a>
                    </li>
                    <!-- <div class="navbar-side-container-2 text-right dropdown">
                        <a class="nav-link font-weight-bold text-uppercase" href="#">
                            <i class="fas fa-chevron-down mr-2"></i>
                            УКР
                        </a>
                    </div> -->
                </ul>
            </div>
    </nav>
    <div id=main-view>
        <div class="fullscreen-img justify-content-center pt-25" style="background-image: url('<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/main.jpg');">
            <h1 class=text-uppercase>Новогодняя ночь в <br class=mobile-invisible> <img class="img-fluid mx-center" src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/logo.png" width=540px></h1>
            <div class="dark-bg mt-5 py-md-4 py-3">
                <div class=container-fluid>
                    <div class=row>
                        <div class="col-md-5 text-md-right text-center align-self-center mb-md-0 mb-3">
                            <h3 class="text-white text-thin mb-0">31 декабря с 22:00</h3>
                        </div>
                        <div class=col-md-2>
                            <a href="#orderAnchor" class="btn btn-yellow">Оторваться <br class=mobile-invisible>по полной!</a>
                        </div>
                        <div class="col-md-5 text-md-left text-center align-self-center mt-md-0 mt-3">
                            <h3 class="text-white text-thin mb-0">и до самого утра</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class=col-lg-4>
                        <a class="btn btn-dark-bg" href="#aboutAnchor">Узнать больше</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid px-sm-5 pb-3" id=aboutAnchor>
        <div class="row text-center">
            <div class=col>
                <h2 class="section-header-huge text-uppercase">Что мы Вам приготовили?</h2>
                <p class=section-description>Столы будут в буквальном смысле ломиться: холодные закуски и салаты,
                    шашлыки и морепродукты на гриле…
                    Поздравления Деда Мороза и Снегурочки, танцы под DJ сет, и ведущий который
                    не даст вам соскучится.
                    Это будет по-настоящему вкусный и отрывной Новый год!</p>
            </div>
        </div>
    </div> -->
    <div class="container-fluid px-0 back-f4f4f4" id=aboutAnchor>
        <div class="row no-gutters">
            <div class=col-md-6>
                <div class=chess-image style="background-image: url('<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/restourant.jpg');"></div>
            </div>
            <div class="col-md-6 align-self-center text-md-left text-center p-md-5 p-4">
                <h3 class="checker-title px-md-4">
                    Capo Di Monte
                </h3>
                <p class="section-description px-md-4 px-0 mb-0 pb-0">
                    Capo Di Monte – ресторан итальянской кухни и то самое место в Киеве, в котором вы узнаете настоящий вкус итальянских блюд. Приятная теплая атмосфера внутри ресторана располагают к вкусной трапезе и приятному отдыху. </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 order-md-2">
                <div class=chess-image style="background-image: url('<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/santa.jpeg');"></div>
            </div>
            <div class="col-md-6 order-md-1 align-self-center text-md-right text-center p-md-5 p-4">
                <h3 class="checker-title px-md-4">
                    ШОУ-ПРОГРАММА
                </h3>
                <p class="section-description px-md-4 px-0 mb-0 pb-0">
                    Эмоции и драйв - основная фишка интерактивного бумажного шоу. В интерактиве принимают участие абсолютно все сотрудники. Это восхитительно яркая, пронизанная весельем и искренними эмоциями атмосфера </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class=col-md-6>
                <div class=chess-image style="background-image: url('<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/party.jpg');"></div>
            </div>
            <div class="col-md-6 align-self-center text-md-left text-center p-md-5 p-4">
                <h3 class="checker-title px-md-4">
                    НЕЗАБЫВАЕМЫЕ ВПЕЧАТЛЕНИЯ
                </h3>
                <p class="section-description px-md-4 px-0 mb-0 pb-0">
                    Освещение – мягкое, играет lounge-музыка, атмосфера романтическая, спокойная и по-домашнему уютная. В зале 60 мягких посадочных мест. В помещении есть бар с классическими итальянскими коктейлями и мировой винной картой, большая часть позиций – итальянские. </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 order-md-2">
                <div class=chess-image style="background-image: url('<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/table.jpg');"></div>
            </div>
            <div class="col-md-6 order-md-1 align-self-center text-md-right text-center p-md-5 p-4" id=dishesAnchor>
                <h3 class="checker-title px-md-4">
                    НОВОГОДНЕЕ МЕНЮ
                </h3>
                <p class="section-description px-md-4 px-0 mb-0 pb-0">
                    Главная ценность итальянской кухни в качественных продуктах, которые нельзя заменить на другие аналоги. Поэтому сыры, салями, качиаторе, итальянская мука капуто, оливковое масло, зелень и приправы привозятся из Италии. </p>
            </div>
        </div>
    </div>
    <div class=container>
        <div class="row justify-content-center p-5">
            <div class=col-md-4>
                <a class="btn btn-yellow" href="#orderAnchor">Оторваться по полной!</a>
            </div>
        </div>
    </div>
    <div class="container-fluid px-sm-5 pb-3 back-f4f4f4" id=programAnchor>
        <div class="row text-center">
            <div class=col>
                <h2 class="section-header-huge text-uppercase">Виды меню</h2>
                <p class=section-description>Столы будут в буквальном смысле ломиться: холодные закуски и салаты,
                    шашлыки и морепродукты на гриле…</p>
            </div>
        </div>
    </div>
    <div class="container-fluid px-sm-5 px-0 pb-3 back-f4f4f4">
        <div class="row justify-content-center mb-5">
            <div class=col-md-10>
                <div class="pumpkin-date text-md-left text-center">
                    <h4 class="mb-0 ml-md-5">Праздничное меню (на две персоны)</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Фирменный оливье
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Сельдь под шубой
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Мясное ассорти
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Сырное плато
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Паштет куриный
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Ассорти канапе с красной и щучьей икрой
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Тар-тар из сельди
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Салат Греческий
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Шашлык свиной, Медальоны из телятины или Стейк из семги, на ваш выбор.
                    (гарнир к основному блюду Картофель запечённый с розмарином)
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Фокача
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Лимонад Тархун 1л
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Водка 0,5 (PRIME)
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Бокал шампанского для каждого гостя
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class=col-md-10>
                <div class="pumpkin-date text-md-left text-center">
                    <h4 class="mb-0 ml-md-5">VIP меню (на две персоны)</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Салат с креветками и авокадо
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Тар-тар из семги
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Карпачо из телятины
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Сырное плато
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Мясное ассорти
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Паштет с фуагра и с луком конфитюр
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Канапе с красной икрой
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Паштет из копченого лосося
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Ассорти морепродуктов на гриле
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Филе Дорадо под соусом с шампанского или Турнедо Росини с фуагра и
                    трюфельной пастой, на ваш выбор. (гарнир к основному блюду Картофель
                    запечённый с розмарином)
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Фокача
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Лимонад Манго Маракуя 1л
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Водка 0,5 (Finlandia)
                </h5>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col-md-1 col-2 px-0 text-right">
                <i class="fas fa-circle dot-shadow"></i>
            </div>
            <div class="col-md-9 col-10">
                <h5 class="ml-md-3 text-brown">
                    Бокал шампанского для каждого гостя
                </h5>
            </div>
        </div>
        <div class="row justify-content-center p-5">
            <div class=col-md-4>
                <a class="btn btn-yellow" href="#orderAnchor">Оторваться по полной!</a>
            </div>
        </div>
    </div>
    <div class="container-fluid px-sm-5 pb-3" id=orderAnchor>
        <div class="row text-center">
            <div class=col>
                <h2 class="section-header-huge text-uppercase">Присоединяйся прямо сейчас!</h2>
                <p class=section-description>Это будет по-настоящему вкусный и отрывной Новый год!</p>
            </div>
        </div>
    </div>
    <div class=container>
        <div class=row>
            <div class="col-md-6 mb-3">
                <div class="pumpkin-price-card bg-white text-center px-5 m-0">
                    <p class="footer-text text-uppercase mt-3 mb-2">Праздничное меню</p>
                    <div class=full-width-line></div>
                    <h2 class="section-header-huge pt-3 mb-0"><b>2000 UAH</b></h2>
                    <small class=footer-text>c человека</small>
                    <div class="full-width-line mt-3"></div>
                    <p class="footer-text text-uppercase mt-3 mb-2">на две персоны</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="pumpkin-price-card bg-white text-center px-5 m-0">
                    <p class="footer-text text-uppercase mt-3 mb-2">VIP меню</p>
                    <div class=full-width-line></div>
                    <h2 class="section-header-huge pt-3 mb-0"><b>3000 UAH</b></h2>
                    <small class=footer-text>c человека</small>
                    <div class="full-width-line mt-3"></div>
                    <p class="footer-text text-uppercase mt-3 mb-2">на две персоны</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid back-f4f4f4 mt-5 py-5">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                <?php echo do_shortcode( '[contact-form-7 id="1247" title="Reserved on New Years 2018"]' ); ?>
                    <!-- <form>
                        <div class="input-pattern mt-3">
                            <input type=text required name=callback_name placeholder="Имя" />
                        </div>
                        <div class="input-pattern mt-2">
                            <input type=number required name=callback_phone placeholder="Номер телефона" />
                        </div>
                        <div class="apart-left mt-3">
                            <p class=text-uppercase>ОСТАЛОСЬ ВСЕГО 16 МЕСТ</p>
                        </div>
                        <div class="apart-buy mt-3">
                            <button class="btn btn-yellow text-uppercase"  type=submit>БРОНИРОВАТЬ</button>
                        </div>
                    </form> -->
                </div>
            </div>
    </div>
    <footer class="black-footer py-md-4 py-0" id=contactAnchor>
        <div class=container-fluid>
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 pt-md-5 pt-3 text-center">
                    <img class="img-fluid mx-center" src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/img/logo.png" width=300>
                </div>
            </div>
        </div>
    </footer>
    <!-- modal thanks -->
    <!-- <div class="modal fade" id=exampleModal3 tabindex=-1 role=dialog aria-labelledby=exampleModalLabel aria-hidden=true>
        <div class=modal-dialog role=document>
            <div class="modal-content no-rounds">
                <div class=container-fluid>
                    <div class="row justify-content-center my-5">
                        <i class="bb-like fa-10x"></i>
                    </div>
                    <div class="row text-center">
                        <div class=col>
                            <h2 class="section-header-huge pt-0">спасибо!</h2>
                            <h6 class="section-header-small text-lowercase">наш менеджер вскоре перезвонит вам</h6>
                        </div>
                    </div>
                    <div class="row  justify-content-center my-5">
                        <div class="col-md-6 col-10">
                            <button type=button id=completed_rezervation_2 class="btn btn-yellow" data-dismiss=modal>Понятно</button>
                        </div>
                    </div>
                    <div id=completed_rezervation_2 style=display:none></div>
                </div>
            </div>
        </div>
    </div>  END modal thanks -->
    <!-- END .footer -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- <script src="js/frontend/jquery-3.3.1.min.js"></script> -->
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/js/frontend/popper.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/js/frontend/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/js/frontend/fontawesome-all.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/js/frontend/main.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/capo_party/js/main.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/js/frontend/custom.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/js/frontend/scroll.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/landing_page/new_year/js/plugins/sweetalert.min.js"></script>
</body>

</html>