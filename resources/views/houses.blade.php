@include('includes.header')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg spad " data-setbg="{{asset('Images/img_20.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Дома</h2>
                    <div class="breadcrumb-controls">
                        <a href="/"><i class="fa fa-home"></i> Главная</a>
                        <a href="/usadba">Усадьба</a>
                        <span>Дома</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb End -->

<section class="price-section spad set-bg"  style="background-color: #FFF">
    <div class=" container-fluid" style="max-width: 1400px">
        <div class="dropdown mb-3" style="text-align: end">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Сортировать
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/houses&price=asc">Сортировать по цене вверх</a>
                <a class="dropdown-item" href="/houses&price=desc">Сортировать по цене вниз</a>
            </div>
        </div>
        <div class="row">



            @foreach($houses as $house)
                <div class="col-lg-6">
                    <div class="single-price-plan"  style="padding-top: 0">
                        <div class="about-img">
                            <section class="hero-section">
                                <div class="hero-items owl-carousel">

                                    @foreach(json_decode($house->images) as $image)
                                        <div class="single-hero-item set-bg" style="max-height: 400px" data-setbg="{{asset($image)}}">
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                        <div class="" style="padding: 20px; background-color: #f5f5f5; min-height: 409px;">
                            <h2 style="padding: 20px 0px; text-align: start " >{{$house->name}}</h2>
                            <div class="" style="text-align: start">
                                <p>Цена: {{$house->price_at_day}}BYN за ночь</p>
                            </div>
                            <ul class="attributes_room">
                                @foreach(json_decode($house->attributes) as $house_attribute)
                                    <li style="display: flex">
                                        <img style="width: 20px" src="{{ $house_attribute->attribute1}}" alt="">
                                        <p>{{ $house_attribute->attribute2 }}</p>
                                    </li>
                                @endforeach

                            </ul>
                            <p style="text-align: start">{{$house->description}}</p>
                            <br>
                            <!-- Add onClick event handler to call MyFunc() -->
                            <a href="/houses/{{$house->houseID}}" class="primary-btn price-btn" >Забронировать</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End of Room Blocks -->
        </div>

    </div>
</section>


<div class=" threed_cont">
    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ornare ante justo, at placerat ante sagittis at. Nunc laoreet consequat ligula vitae ornare. Nam hendrerit elit urna, id tristique nisl aliquet pharetra. Proin sit amet nisl dui. Donec turpis mauris, convallis ultricies vestibulum et, auctor id eros. Aenean neque lectus, rutrum nec massa posuere, varius ultricies risus. Sed eleifend neque mauris, eu sagittis nulla ullamcorper non. Etiam luctus tristique felis, vitae sollicitudin felis varius et. Aenean vitae libero nec dolor tempor facilisis vitae vitae lacus. Morbi tristique pellentesque velit id sodales. Etiam in dapibus ipsum, ac suscipit tellus. Maecenas vel urna a tellus venenatis blandit vel in felis. Maecenas molestie lacinia ex eget interdum. Nulla facilisi. Praesent mi lorem, venenatis vel urna a, ullamcorper interdum lectus. Maecenas justo ante, gravida at nulla ac, consectetur rutrum leo. </div>
    <canvas class="webgl"></canvas>
    <a class="close_threed" onclick="MyFunc3()"><img src="{{asset('Icons/close.png')}}" alt=""></a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r124/three.min.js"></script>
<script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>
<script src="https://unpkg.com/three@0.126.0/examples/js/controls/OrbitControls.js"></script>


<div class="checkout_form">
    <img src="" alt="">
    <h2></h2>
    <h3></h3>
    <div class="single-price-plan">
        <ul></ul>
    </div>

</div>

<div id="room-data" data-rooms='<?php echo json_encode($houses); ?>'></div>

<script>
    // Получить данные из атрибута data-rooms
    var roomsData = document.getElementById('room-data').getAttribute('data-rooms');
    var rooms = JSON.parse(roomsData)
</script>




<style>
    .form_popup_info{
        display: none;
    }

    .popup_back{
        display: none;
    }
    .popup_back_active{
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 101;
    }
    .active_popup{
        display: block;
        position: fixed;
        top: 50%;
        right: 25%;
        transform: translate(-50%, -50%);
        padding-top: 100px;
        width: 100%;
        max-width: 1200px;
        height: 100%;
        z-index: 104;
    }


    .checkout_form{
        width: 800px;
        height: 700px;
        border-radius: 30px;
        position: fixed;
        right: -1000px;
        top: 90px;
        z-index: 100;
        background-color: #FFF;
        transition: .6s;
    }

    .checkout_form_active{
        right: 50px;
        transition: .6s;
    }

    .container {
        position: relative;
        right: 0;
        transition: right 0.6s ease;
    }

    .cont_active {
        right: 450px;
    }

    .attributes_room{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .attributes_room li{
        align-items: center;
        gap: 10px;
        border: 1px solid #8f8fa8;
        border-radius: 5px;
        padding: 10px;
    }

    .attributes_room li p{
        margin: 0;
    }

    .threed_cont{
        display: none;

    }




    .webgl{
        position: fixed;
        z-index: 105;
        top: 50%;
        right: 200px;
        transform: translateY(-50%);
        display: block;
    }

    .active_webdl{
        display: block;
        position: fixed;
        z-index: 200;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: black;
        overflow: hidden;
    }

    .threed_cont .text{
        position: absolute;
        top: 50%;
        left: 200px;
        color: #FFF;
        width: 500px;
        z-index: 201;
        transform: translateY(-50%);
    }

    .close_threed{
        position: absolute;
        top: 50px;
        right: 50px;
    }
    .close_threed img{
        width: 30px;
    }


</style>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery (необходим для Bootstrap JavaScript) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@include('includes.footer')
