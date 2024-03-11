@include('includes/header')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg spad" data-setbg="{{asset('Images/img_16.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Усадьба</h2>
                    <div class="breadcrumb-controls">
                        <a href="/"><i class="fa fa-home"></i> Главная</a>
                        <span>Усадьба</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->


<!-- Classes Section Begin -->
<section class="classes-section schedule-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="classes-item set-bg" data-setbg="{{asset('fotogallery/1.jpg')}}">
                    <h4>Дома</h4>
                    <p>Выберите дом под свой комфорт</p>
                    <a href="/houses" class="primary-btn class-btn">Выбрать</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="classes-item set-bg" data-setbg="{{asset('fotogallery/2.jpg')}}">
                    <h4>Мероприятия</h4>
                    <p>Проведите своё мероприятие на высшем уровне
                    </p>
                    <a href="/events" class="primary-btn class-btn">Выбрать</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="classes-item set-bg" data-setbg="{{asset('fotogallery/4.jpg')}}">
                    <h4>Услуги</h4>
                    <p>Проведите своё мероприятие на высшем уровне </p>
                    <a href="#" class="primary-btn class-btn">Вырать</a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Classes Section End -->


@include('includes/footer')
