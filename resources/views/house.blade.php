
<!-- Подключение хедера -->
@include('includes.header')


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
                <a style="text-align: start"  onClick="MyFunc2();">Посмотрите в 3D</a>
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
            <input type="text" id="daterange" name="daterange" value="01/01/2018 - 01/15/2018" />

            <button onclick="checkAvailability()">Забронировать</button>
        </div>
    </div>
</section>
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


<!-- Подключение футера -->
@include('includes.footer')
