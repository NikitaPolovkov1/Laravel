<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activitar | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href=" {{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('')}}css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>

<body>
<div id="preloder">
    <div class="loader"></div>
</div>

<header class="header-section">
    <div class="container-fluid">
        <div class="logo">
            <a href="/">
                <img src="img/logo.svg" alt="">
            </a>
        </div>
        <div class="top-social">
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a id="search_btn" style="background-color: transparent; border: none"><i class="fa fa-search" style="color: #FFF"></i>
            </a>
            @if(Auth::check())
                <a href="/account"><img style="border-radius: 50%" width="30px" src="{{asset(Auth::user()->foto)}}"/></a>
            @endif
            @if(!Auth::check())
                <a href="/account"><i class="fa fa-user" style="color: #ffffff;"></i></a>
            @endif
        </div>
        <div class="container">
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="/">Главная</a></li>
                        <li><a href="/about">О нас</a></li>
                        <li><a href="/usadba">Усадьба</a>
                            <ul class="dropdown">
                                <li><a href="./houses">Дома</a></li>
                                <li><a href="./blog-single.html">Мероприятия</a></li>
                                <li><a href="./blog-single.html">Услуги</a></li>
                            </ul>
                        </li>
                        <li><a href="/gallery">Фотогалерея</a></li>

                        <li><a href="/blog">Блог</a>
                            <ul class="dropdown">
                                <li><a href="./about-us.html">Мероприятия</a></li>
                                <li><a href="./blog-single.html">События</a></li>
                            </ul>
                        </li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-item set-bg" data-setbg="{{asset('Images/img.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-text">
                            <h2>Усадьба "ACTIVITAR"</h2>
                            <h1>Отдых и уют</h1>
                            <a href="#" class="primary-btn">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-hero-item set-bg" data-setbg="{{asset('Images/img_14.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-text">
                            <h2>Усадьба "Моя усадьба"</h2>
                            <h1>Отдых и уют</h1>
                            <a href="#" class="primary-btn">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-hero-item set-bg" data-setbg="{{asset('Images/img.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-text">
                            <h2>Усадьба "Моя усадьба"</h2>
                            <h1>Отдых и уют</h1>
                            <a href="#" class="primary-btn">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Hero End -->

<!-- Feature Section Begin -->
<section class="feature-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-item set-bg" data-setbg="{{asset('Images/img_11.png')}}">
                    <h3>Мероприятия</h3>
                    <p>Наши мероприятия - это идеальное сочетание стиля, уюта и профессионализма, которое сделает ваше событие неповторимым и запоминающимся.</p>
                    <a href="/meroprim" class="primary-btn f-btn">Подробнее</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item set-bg" data-setbg="{{asset('Images/img_12.png')}}">
                    <h3>Услуги</h3>
                    <p>Наши разнообразные услуги предоставят вам незабываемый опыт отдыха, сочетая в себе комфорт, уют и внимательное обслуживание в прекрасной атмосфере усадьбы.</p>
                    <a href="#" class="primary-btn f-btn">Подробнее</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item set-bg" data-setbg="{{asset('Images/img_10.png')}}">
                    <h3>Уютные домики</h3>
                    <p>Уютные домики предлагают идеальное сочетание комфорта и природной гармонии, чтобы вы могли насладиться спокойным отдыхом в обворожительной обстановке нашей усадьбы</p>
                    <a href="/houses" class="primary-btn f-btn">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature Section End -->

<!-- About Section Begin -->
<section class="home-about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <h2>Добро пожаловать в отдых</h2>
                    <p class="short-details">ACTIVITAR - это не просто агроусадьба, это место, где воплощаются в жизнь ваши самые заветные мечты.</p>
                    <p class="long-details">Наши уютные номера и коттеджи предлагают идеальное сочетание комфорта и аутентичного сельского стиля. Мы стремимся создать для вас домашнюю атмосферу, в которой вы сможете расслабиться и насладиться прекрасным отдыхом вдали от городской суеты.</p>
                    <a href="#" class="primary-btn about-btn">Подробнее</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{asset('Images/img_4.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Video Section Begin -->
<section class="video-section set-bg" data-setbg="{{asset('Images/img_5.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-text">
                    <h2>Ознакомьтесь с нами</h2>
                    <a href="https://www.youtube.com/watch?v=f2BfbICRQwk" class="play-btn video-popup">
                        <i class="fa fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Section End -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Наши новости</h2>
                    <p>Здесь представлены наша повседневная жизнь и проодимые мероприятия</p>
                </div>
            </div>
        </div>
        <div class="row blog-gird">
            <div class="grid-sizer"></div>
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item large-item set-bg" data-setbg="{{$post->post_img}}">
                        <a href="/blog/{{$post->post_id}}" class="blog-text">
                            <div class="categories">{{$post->post_title}}</div>
                            <h5>{{$post->post_sub_title}}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->



<!-- Map Section Begin -->
<div class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d188618.51311104256!2d-71.236572!3d42.381647!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1576756626784!5m2!1sen!2sbd" height="590" style="border: 0" allowfullscreen=""></iframe>
    <div class="map-contact-detalis">
        <div class="open-time">
            <h5>Режим работы:</h5>
            <ul>
                <li>Будние: <span>09:00 - 20:00</span></li>
                <li>Выходные: <span>09:00 - 18:00</span></li>
            </ul>
        </div>
        <div class="map-contact-form">
            <h5>Обратный звонок</h5>
            <form action="#">
                <input type="text" placeholder="Имя">
                <input type="text" class="phone" placeholder="Телефон">
                <textarea placeholder="Сообщение"></textarea>
                <button type="submit" class="site-btn">Отправить</button>
            </form>
        </div>
    </div>
</div>

<div class="search_modal">
    <form action="{{route('search')}}" id="search_form" class="">
        <input type="text" class="form-control mr-2" name="search" placeholder="Поиск">
        <button type="submit" class="btn btn-dark">Найти</button>
    </form>
</div>


<div class="overlay">

</div>
<!-- Map Section End -->

<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>


<script>
    $('#search_btn').click(function(){
        $('.search_modal').addClass('active_search');
        $('.overlay').show();
    });

    $('.overlay').click(function(){
        $('.search_modal').removeClass('active_search');
        $('.overlay').hide();
    });
</script>




@include('includes/footer')

