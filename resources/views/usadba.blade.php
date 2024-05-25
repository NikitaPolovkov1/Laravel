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
                    <a href="/services" class="primary-btn class-btn">Вырать</a>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="w-100 h-100 position-relative" style="background-image: url('{{asset('fotogallery/karta.png')}}'); background-size: cover">
    <!-- Добавляем контейнер для домов -->
    <div class="house-container">
        @foreach ($houses as $house)
            <a href="/houses/{{$house->houseID}}" class="house-marker house-marker-{{$house->houseID}} house-link" data-house="{{$house->house_name}}">{{$house->house_name}}</a>
        @endforeach
    </div>

</section>

<style>
    /* Стили для контейнера домов */
    .house-container {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* Стили для кружочков */
    .house-marker {
        position: absolute;
        top: 40px;
        left: 40px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: red;
        cursor: pointer;
        transform: translate(-50%, -50%);
        display: block;
        text-decoration: none;
    }

    .house-marker-1 {
        top: 460px;
        left: 946px;
    }
    .house-marker-2 {
        top: 585px;
        left: 1150px;
    }
    .house-marker-3 {
        top: 520px;
        left: 870px;
    }
    .house-marker-7 {
        top: 490px;
        left: 1007px;
    }

</style>




<!-- Classes Section End -->


@include('includes/footer')
