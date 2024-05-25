<!-- Раздел подвала -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-logo-item">
                    <div class="f-logo">
                        <a href="#"><img src="img/logo.png" alt=""></a>
                    </div>
                    <p>Несмотря на рост интернета за последние семь лет, использование бесплатных телефонных номеров в телевизионной рекламе продолжается.</p>
                    <div class="social-links">
                        <h6>Подпишитесь</h6>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="footer-widget">
                    <h5>Блог</h5>
                    <div class="footer-blog">
                        <a href="#" class="fb-item">
                            <h6>Большинство людей, которые работают</h6>
                            <span class="blog-time"><i class="fa fa-clock-o"></i> 02 января 2019</span>
                        </a>
                        <a href="#" class="fb-item">
                            <h6>Фриланс-дизайн: как</h6>
                            <span class="blog-time"><i class="fa fa-clock-o"></i> 02 января 2019</span>
                        </a>
                        <a href="#" class="fb-item">
                            <h6>иметь компьютер дома</h6>
                            <span class="blog-time"><i class="fa fa-clock-o"></i> 02 января 2019</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>Меню</h5>
                    <ul class="workout-program">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/about">О нас</a></li>
                        <li><a href="/usadba">Усадьба</a></li>
                        <li><a href="/gallery">Фотогалерея</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h5>Информация</h5>
                    <ul class="footer-info">
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>Телефон:</span>
                            (12) 345 6789
                        </li>
                        <li>
                            <i class="fa fa-envelope-o"></i>
                            <span>Email:</span>
                            Colorlib.info@gmail.com
                        </li>
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>Адрес</span>
                            Iris Watson, Box 283 8562, NY
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="ct-inside"><!-- Ссылка на Colorlib не может быть удалена. Шаблон лицензирован по CC BY 3.0. -->
                        Авторские права &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Этот шаблон сделан с <i class="fa fa-heart-o" aria-hidden="true"></i> от <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Ссылка на Colorlib не может быть удалена. Шаблон лицензирован по CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r124/three.min.js"></script>
<script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>
<script src="https://unpkg.com/three@0.126.0/examples/js/controls/OrbitControls.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/house.js')}}"></script>

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

</body>
</html>
