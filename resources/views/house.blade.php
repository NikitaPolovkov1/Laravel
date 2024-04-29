
<!-- Подключение хедера -->
@include('includes.header')


<div class="about-img">
    <div class="hero-items owl-carousel">

        @foreach(json_decode($house->images) as $image)
            <div class="single-hero-item set-bg" style="max-height: 800px" data-setbg="{{asset($image)}}">
            </div>

        @endforeach
    </div>
</div>


<section class="" >
    <div class="container">
        <div class="row pt-5 pb-5">
                <div class="about-text">
                    <div class="back_link"><a href="/houses">Все номера</a></div>
                    <h2 style="color: black">{{$house->name}}</h2>
                    <p class="long-details" style="color: black">{{$house->description}}</p>
                    <ul class="attributes_room" style="color: black">
                        @foreach(json_decode($house->attributes) as $house_attribute)
                            <li style="display: flex">
                                <img style="width: 20px" src="{{asset( $house_attribute->attribute1)}}" alt="">
                                <p style="color: black">{{ $house_attribute->attribute2 }}</p>
                            </li>
                        @endforeach

                    </ul>
                    <a style="text-align: start; color: #8e6919; font-size: 1rem" class="mt-3 d-block"   onClick="MyFunc2();">Посмотрите в 3D</a>
                </div>

            <div class="col-3 m-0 p-0  mt-3 mr-4">
                <label for="exampleInputEmail1">Количество взрослых:</label>
                <select class="custom-select p-2" id="inputGroupSelect01">--}}
                    <option selected>Количество взрослых...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                    <option value="3">5</option>
                </select>
            </div>
            <div class="col-3 m-0 p-0  mt-3 mr-5">
                <label for="exampleInputEmail1">Количество детей:</label>
                <select class="custom-select p-2" id="inputGroupSelect02">--}}
                    <option selected>Количество детей...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                    <option value="3">5</option>
                </select>
            </div>
            <div class="col-3 m-0 p-0  mt-3">
                <button class="btn btn-dark w-100" style="margin-top: 1.9rem !important;" onclick="get_people();">Забронировать</button>
            </div>
            <div id="alertError2" class="alert alert-danger alert_error my-3" role="alert">
                Требуется выбрать количество людей для проживания
            </div>
        </div>
    </div>
</section>

<section class="" style="background-color: #f5f5f5">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="">
                <h3 style="color: black">Подробнее</h3>
                <p class="mt-4 w-75">{{$house->long_description}}</p>
                <a href="" download="" class="link_plan">Скачать план дома</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container my-2 p-0 mt-5">
        <h2 class="my-4" style="color: black">Похожие варианты:</h2>
        <div class="row">
            @foreach($houses as $house)
                <div class="col-lg-6">
                    <div class="single-price-plan"  style="padding-top: 0">
                        <div class="about-img">
                            <section class="hero-section">
                                <div class="hero-items owl-carousel">

                                    @foreach(json_decode($house->images) as $image)
                                        <div class="single-hero-item set-bg" style="max-height: 300px" data-setbg="{{asset($image)}}">
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                        <div class="" style="padding: 20px; background-color: #f5f5f5;">
                            <h2 style="padding: 20px 0px; text-align: start " >{{$house->name}}</h2>
                            <div class="" style="text-align: start">
                                <p>Цена: {{$house->price_at_day}}BYN за ночь</p>
                            </div>
                            <p style="text-align: start">{{$house->description}}</p>
                            <br>
                            <a href="/houses/{{$house->houseID}}" class="primary-btn price-btn" >Забронировать</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="booking_form">
        <h3 class="text-center py-3 position-relative" style="color: #FFF; background-color: black">Забронировать дом: <i class="position-absolute cross_pos"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg></i></h3>
        <div class="about-img">
            <div class="hero-items owl-carousel">

                @foreach(json_decode($house->images) as $image)
                    <div class="single-hero-item set-bg" style="max-height: 400px" data-setbg="{{asset($image)}}">
                    </div>

                @endforeach
            </div>
        </div>
        <div class="container p-3">
            <div class="col-12">
                <h3>Вы выбрали: {{$house->name}}</h3>
                <br>
                <label for="daterange">Выбрать дату:</label>

                <input id="daterange" type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
            </div>
            <div class="col-12 mt-3">
                <label for="daterange">Выбрать тариф:</label>

                <select class="form-control custom-select" id="tarif">
                    <option value="Всё включено">Всё включено</option>
                    <option value="Только завтраки">Только завтраки</option>
                    <option value="Только обед">Только обед</option>
                    <option value="Только ужин">Только ужин</option>
                </select>
            </div>

            <div id="alertError" class="alert alert-danger alert_error m-3" role="alert">
                Выбранные даты не доступны для брони, пожалуйста выберите корректные даты!
            </div>
            <div class="total p-3">
                <label id="count_children_total">Количество детей: <span style="color: #8e6919" id="count_children"></span></label>
                <br>
                <label>Количество взрослых: <span style="color: #8e6919" id="count_people"></span> </label>
                <br>
                <label>Цена за ночь: <span style="color: #8e6919"><span id="price_at_day"> {{$house->price_at_day}}</span> BYN</span> </label>
                <br>
                <label>Количество ночей: <span id="count_nights" style="color: #8e6919"></span> </label>
                <br>
                <label> <strong> ИТОГО: <span id="result_price" style="color: #8e6919"></span></strong> </label>
            </div>
            <button class="btn btn-dark w-100 " onclick="nextstep()">Забронировать</button>
        </div>
</section>


<section class="booking_form_last">
    <form action="" id="bookingForm">
        <h3 class="text-center py-3 position-relative" style="color: #FFF; background-color: black">Забронировать дом: <i class="position-absolute cross_pos_2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg></i></h3>

        <div class="container p-3">
            <div class="col-12">
                <h3>Вы выбрали: {{$house->name}}</h3>

            </div>
            <div class="col-12 mt-3">
                <label for="daterange">Фамилия Имя Отчество:</label>
                <input type="text" name="full_name" class="form-control">
                <label for="daterange" >Номер телефона:</label>
                <input type="text" id="phone1" name="phone_number" class="form-control">
                <label for="daterange" >Электронная почта:</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div id="alertError" class="alert alert-danger alert_error m-3" role="alert">
                Выбранные даты не доступны для брони, пожалуйста выберите корректные даты!
            </div>
            <div class="total p-3">
                <label id="count_children_total_">Дата заезда: <span style="color: #8e6919" id="start_date_"></span></label>
                <br>
                <label id="count_children_total_">Дата выезда: <span style="color: #8e6919" id="end_date_"></span></label>
                <br>
                <label id="count_children_total_2">Количество детей: <span style="color: #8e6919" id="count_children_2"></span></label>
                <br>
                <label>Количество взрослых: <span style="color: #8e6919" id="count_people_2"></span> </label>
                <br>
                <label>Тариф: <span style="color: #8e6919" id="tariff_last"></span> </label>
                <br>
                <label>Цена за ночь: <span style="color: #8e6919"><span id="price_at_day_2"> {{$house->price_at_day}}</span> BYN</span> </label>
                <br>
                <label>Количество ночей: <span id="count_nights_2" style="color: #8e6919"></span> </label>
                <br>
                <label> <strong> ИТОГО: <span id="result_price_2" style="color: #8e6919"></span></strong> </label>
            </div>
            <button class="btn btn-dark w-100 " type="submit">Забронировать</button>
        </div>
    </form>
</section>

<div class="overlay">

</div>



<style>

    .book_house {
        max-width: 600px;
    }

    .book_house h3 {
        color: black; /* Цвет текста */
    }

    .form-group label {
        color: black; /* Цвет текста */
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




<script>
    var js_var = document.getElementById("my_var").value;
    var dataObject = JSON.parse(js_var);

    var reservedDates = []; // массив для хранения забронированных дат

    dataObject.forEach(function(data) {
        reservedDates.push([data.start_date, data.end_date]); // добавляем забронированные даты в массив
    });

    $('input[name="daterange"]').daterangepicker({
        "showDropdowns": true,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Применить",
            "cancelLabel": "Отмена",
            "fromLabel": "С",
            "toLabel": "По",
            "customRangeLabel": "Custom",
            "weekLabel": "Н",
            "daysOfWeek": [
                "Вс",
                "Пн",
                "Вт",
                "Ср",
                "Чт",
                "Пт",
                "Сб"
            ],
            "monthNames": [
                "Январь",
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Сентябрь",
                "Октябрь",
                "Ноябрь",
                "Декабрь"
            ],
            "firstDay": 1
        },
        "startDate": "16/02/2024",
        "endDate": "19/02/2024",
        "isInvalidDate": function(date) {
            // преобразуем дату в строку в формате 'YYYY-MM-DD'
            var dateString = date.format('YYYY-MM-DD');

            // проверяем, есть ли дата в массиве забронированных дат
            return reservedDates.some(function(reservedDate) {
                return dateString >= reservedDate[0] && dateString <= reservedDate[1];
            });
        }
    }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });


    var dateRangeInput = document.getElementById('daterange');

    $('input[name="daterange"]').change(function() {
        var dateRange = document.getElementById('daterange').value;
        var startDate = moment(dateRange.split(' - ')[0], 'DD/MM/YYYY');
        var endDate = moment(dateRange.split(' - ')[1], 'DD/MM/YYYY');

        var nights = endDate.diff(startDate, 'days');

        var tarif = document.getElementById('tarif').textContent;
        var tarif_itog = 0;
        switch (tarif)
        {
            case 'Всё включено':
                tarif_itog = 60;
                break;
            case 'Только завтраки':
                tarif_itog = 20;
                break;
            case 'Только обед':
                tarif_itog = 30;
                break;
            case 'Только ужин':
                tarif_itog = 20;
                break;
            default:
                tarif_itog = 60;
                break;
        }

        var count_persons =   document.getElementById('count_people').textContent;
        var price_at_day_itog = document.getElementById('price_at_day').textContent;
        switch (count_persons) {
            case 1:
                break;
            case 2:
                price_at_day_itog += 20;
                tarif_itog *= 2;
            case 3:
                price_at_day_itog += 40;
                tarif_itog *= 3;
            case 4:
                price_at_day_itog += 60;
                tarif_itog *= 4;
            case 5:
                price_at_day_itog += 80;
                tarif_itog *= 5;
        }


        var all_price = ( nights * tarif_itog) + ( nights * price_at_day_itog);



        for (var i = 0; i < dataObject.length; i++) {
            var dataStartDate = moment(dataObject[i].start_date, 'YYYY-MM-DD');
            var dataEndDate = moment(dataObject[i].end_date, 'YYYY-MM-DD');

            if ((startDate.isSameOrAfter(dataStartDate) && startDate.isSameOrBefore(dataEndDate)) || (endDate.isSameOrAfter(dataStartDate) && endDate.isSameOrBefore(dataEndDate))) {
                document.getElementById('alertError').style.display = 'block';
                $(this).val('01/01/2018 - 01/15/2018');
                return;
            }
            if (startDate.isSameOrBefore(dataEndDate) && endDate.isSameOrAfter(dataStartDate)) {
                document.getElementById('alertError').style.display = 'block';
                $(this).val('01/01/2018 - 01/15/2018');
                return;
            }
        }
        document.getElementById('alertError').style.display = 'none';
        document.getElementById('count_nights').textContent = nights;
        document.getElementById('result_price').textContent = all_price + " BYN";
        document.getElementById('start_date_').textContent = startDate;
        document.getElementById('end_date_').textContent = endDate;
    });

    function get_people() {
        if(document.getElementById('inputGroupSelect01').value == "Количество взрослых..."){
            $('#alertError2').slideDown('slow');
            return;
        }


        $('#alertError2').hide();
        document.getElementById('count_children').textContent = document.getElementById('inputGroupSelect02').value;

        if(document.getElementById('inputGroupSelect02').value == "Количество детей..."){
            $('#count_children_total').hide();

        }
        else{
            $('#count_children_total').show();
        }
        document.getElementById('count_people').textContent = document.getElementById('inputGroupSelect01').value;

        $('.booking_form').addClass('active_booking_form');
        $('.overlay').show();
    }

    $('.overlay').click(function (){
        $('.booking_form').removeClass('active_booking_form');
        $('.booking_form_last').removeClass('active_booking_form_last');
        $('.overlay').hide();
    });

    $('.cross_pos').click(function (){
        $('.booking_form').removeClass('active_booking_form');
        $('.overlay').hide();
    });


    $('.cross_pos_2').click(function (){
        $('.booking_form_last').removeClass('active_booking_form_last');
    });



    function nextstep(){
        $('.booking_form_last').addClass('active_booking_form_last');
        document.getElementById('count_nights_2').textContent = document.getElementById('count_nights').textContent;
        document.getElementById('result_price_2').textContent = document.getElementById('result_price').textContent;
        document.getElementById('count_children_2').textContent = document.getElementById('inputGroupSelect02').value;
        document.getElementById('count_people_2').textContent = document.getElementById('inputGroupSelect01').value;

        document.getElementById('tariff_last').textContent =  document.getElementById('tarif').value;
        if(document.getElementById('inputGroupSelect02').value == "Количество детей..."){
            $('#count_children_total_2').hide();

        }
        else{
            $('#count_children_total_2').show();
        }
    }



</script>



<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#bookingForm').submit(function(event) {

            event.preventDefault();

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var formData = {
                house_name: '{{$house->name}}',
                full_name: $('input[name="full_name"]').val(),
                phone_number: $('input[name="phone_number"]').val(),
                email: $('input[name="email"]').val(),
                arrival_date: $('#start_date_').text(),
                departure_date: $('#end_date_').text(),
                children_count: $('#count_children_2').text(),
                adult_count: $('#count_people_2').text(),
                tariff: $('#tariff_last').text(),
                price_at_day: $('#price_at_day_2').text(),
                nights_count: $('#count_nights_2').text(),
                total_price: $('#result_price_2').text(),
                _token: csrfToken
            };

            $.ajax({
                type: 'POST',
                url: '/save-lead',
                data: formData,
                dataType: 'json',
                encode: true
            })
                .done(function(data) {
                  alert('Вы успешно заказали заказ')
                })
                .fail(function(data) {
                    // Обработка ошибки
                    console.error(data);
                });
        });
    });



</script>


<!-- Подключение футера -->
@include('includes.footer')
