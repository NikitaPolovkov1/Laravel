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
                                <img style="width: 20px" src="{{asset( $house_attribute->image)}}" alt="">
                                <p>{{ $house_attribute->attribute }}</p>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="http://127.0.0.1:8001/Images/img_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@foreach(json_decode($house->date->free_dates) as $date)
    {{$date}}
@endforeach



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

@include('includes.footer')
