
<!-- Подключение хедера -->
@include('includes.header')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg spad" data-setbg="{{asset('Images/img_16.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>О нас</h2>
                    <div class="breadcrumb-controls">
                        <a href="/"><i class="fa fa-home"></i> Главная</a>
                        <span>О нас</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->


<section class="home-about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <h2>{{$house->name}}</h2>
                    <p class="long-details">{{$house->description}}</p>
                    <ul class="attributes_room">
                        @foreach(json_decode($house->attributes) as $house_attribute)
                            <li style="display: flex">
                                <img style="width: 20px" src="{{asset( $house_attribute->attribute1)}}" alt="">
                                <p>{{ $house_attribute->attribute2 }}</p>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <br>
                <a style="text-align: start; color: #FFF" class=""  onClick="MyFunc2();">Посмотрите в 3D</a>
            </div>
            <div class="col-lg-6">
                <div class="about-img">
                    <div class="hero-items owl-carousel">

                        @foreach(json_decode($house->images) as $image)
                            <div class="single-hero-item set-bg" style="max-height: 400px" data-setbg="{{asset($image)}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="select_dates">



        </div>
        <form action="" class="book_house" style="max-width: 1200px">
            <h3 style="color: #FFF">Забронировать дом:</h3>
            <div class="d-flex" style="gap: 20px">
                <div class="w-50">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Дата бронирования</label>
                        <input type="text" class="form-control" id="daterange" name="daterange" value="01/01/2018 - 01/15/2018" onchange="checkAvailability()" aria-describedby="emailHelp">
                        <small id="dateHelp" class="form-text text-muted">Дата доступна для бронирования</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Электронная почта</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Электронная почта">
                        <small id="emailHelp" class="form-text text-muted">На неё мы пришлём информацию о брони</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Количество человек:</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Количество человек">
                        <small id="emailHelp" class="form-text text-muted">Нам важно знать кол-во человек</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Тариф:</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02">
                                <option selected>Выбрать...</option>
                                <option value="1">Всё включено</option>
                                <option value="2">Только завтраки</option>
                                <option value="3">Завтрак и обед</option>
                            </select>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Нам важно знать ваши предпочтения</small>
                    </div>
                </div>
                <div class="w-50">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ФИО</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ФИО">
                        <small id="emailHelp" class="form-text text-muted">Нам важно знать как вас зовут</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Гражданство</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Гражданство">
                        <small id="emailHelp" class="form-text text-muted">Нам важно знать кто вы</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Телефон</label>
                        <input type="tel" class="form-control" id="phone1" aria-describedby="emailHelp" placeholder="Телефон">
                        <small id="emailHelp" class="form-text text-muted">Нам важно знать для связи с вами</small>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark w-100" onclick="checkAvailability()">Забронировать</button>
        </form>
    </div>
</section>


<style>

    .book_house {
        max-width: 600px;
    }

    .book_house h3 {
        color: #fff; /* Цвет текста */
    }

    .form-group label {
        color: #fff; /* Цвет текста меток */
    }

</style>

<div class=" threed_cont">
    <div class="text">
        <h2>{{$house->name}}</h2>
        <p>{{$house->description}}</p>
    </div>
    <canvas class="webgl"></canvas>
    <a class="close_threed" onclick="MyFunc3()"><img src="{{asset('Icons/close.png')}}" alt=""></a>
</div>

<div class="" id="mydiv"></div>
<input type="hidden" id="my_var" value="{{json_encode($result)}}">
<script src="https://www.sng-it.ru/bitrix/templates/master/js/jquery.inputmask.bundle.min.js"></script>

<inut id="phone1" type="text" name="phone1" value="" placeholder="Телефон" />

<!-- Подключение футера -->
@include('includes.footer')
