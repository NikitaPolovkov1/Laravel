<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="intro">

    <div class="promo">
        <video class="video_media" loop autoplay muted >
                <source  src="{{ asset('videos/promo.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="intro_content">
        <div class="container">
            <h1 class="intro_title">Добро пожаловать в мир искусства</h1>
            <h3 class="sub_title"> Самая большая фотостудия Беларуси</h3>
            <button class="create_order_btn btn_standart">Записаться на фотосессию</button>
        </div>
    </div>
    <div class="section_content">
            <h1 class="main__heading">Популярные услуги</h1>
            <div class="main__cards cards">
                <div class="cards__inner">
                    <div class="cards__card card">
                        <h2 class="card__heading">Basic</h2>
                        <p class="card__price">$9.99</p>
                        <ul role="list" class="card__bullets flow">
                            <li>Access to standard workouts and nutrition plans</li>
                            <li>Email support</li>
                        </ul>
                        <a href="#basic" class="card__cta cta">Get Started</a>
                    </div>

                    <div class="cards__card card">
                        <h2 class="card__heading">Pro</h2>
                        <p class="card__price">$19.99</p>
                        <ul role="list" class="card__bullets flow">
                            <li>Access to advanced workouts and nutrition plans</li>
                            <li>Priority Email support</li>
                            <li>Exclusive access to live Q&A sessions</li>
                        </ul>
                        <a href="#pro" class="card__cta cta">Upgrade to Pro</a>
                    </div>

                    <div class="cards__card card">
                        <h2 class="card__heading">Ultimate</h2>
                        <p class="card__price">$29.99</p>
                        <ul role="list" class="card__bullets flow">
                            <li>Access to all premium workouts and nutrition plans</li>
                            <li>24/7 Priority support</li>
                            <li>1-on-1 virtual coaching session every month</li>
                            <li>Exclusive content and early access to new features</li>
                        </ul>
                        <a href="#ultimate" class="card__cta cta">Go Ultimate</a>
                    </div>
                </div>

                <div class="overlay cards__inner"></div>
            </div>
    </div>
    <div class="section_content">
        <div class="flex_container">
            <div class="flex_container_sm grimer_rooms grimer_rooms_data">
            </div>
            <div class="flex_container_sm second_grimer_rooms">
                <div class=" ss"></div>
                <div class=" tt"></div>
            </div>

        </div>
    </div>
</div>
<script src="{{asset('css/script.js')}}"></script>
</body>
</html>
