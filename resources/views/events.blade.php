 @include('includes.header')

        <section class="breadcrumb-section set-bg spad" data-setbg="{{asset('Images/img_20.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>Услуги</h2>
                            <div class="breadcrumb-controls">
                                <a href="/"><i class="fa fa-home"></i> Главная</a>
                                <a href="/usadba">Усадьба</a>
                                <span>услуги</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="price-section spad set-bg" style="background-color: #FFF">
            <div class="container-fluid" style="max-width: 1400px">
{{--                <div class="row">--}}
{{--                    @foreach($types as $type)--}}
{{--                        <button class="btn btn-dark m-2"><a style="color: #FFF;" href="/event/category={{$type->name}}">{{$type->name}}</a></button>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                <div class="row">
                    <!-- Левая часть с фильтрами и кнопками -->
                    <div class="col-md-3 mt-5">
                        <div class="card mb-4">
                            <div class="card-header">
                                Фильтры
                            </div>
                            <div class="card-body">
                                <form action="/services" method="GET">
                                    <!-- Ползунок для фильтрации по цене -->
                                    <div class="form-group">
                                        <label for="price-range">Диапазон цены:</label>
                                        <div id="price-range"></div>
                                        <p>Цена: от <span id="min-price-display">${{ request()->get('min_price', $minPrice) }}</span> до <span id="max-price-display">${{ request()->get('max_price', $maxPrice) }}</span></p>
                                        <input type="hidden" id="min-price" name="min_price" value="{{ request()->get('min_price', $minPrice) }}">
                                        <input type="hidden" id="max-price" name="max_price" value="{{ request()->get('max_price', $maxPrice) }}">
                                    </div>
                                    <!-- Ползунок для фильтрации по времени -->
                                    <div class="form-group">
                                        <label for="hours-range">Диапазон времени (часы):</label>
                                        <div id="hours-range"></div>
                                        <p>Время: от <span id="min-hours-display">{{ request()->get('min_hours', $minHours) }} часа</span> до <span id="max-hours-display">{{ request()->get('max_hours', $maxHours) }} часа</span></p>
                                        <input type="hidden" id="min-hours" name="min_hours" value="{{ request()->get('min_hours', $minHours) }}">
                                        <input type="hidden" id="max-hours" name="max_hours" value="{{ request()->get('max_hours', $maxHours) }}">
                                    </div>
                                    <!-- Кнопка для отправки формы -->
                                    <button type="submit" class="btn btn-primary">Применить фильтры</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Правая часть с кнопками сортировки и карточками услуг -->
                    <div class="col-md-9">
                        <!-- Кнопки сортировки -->
                        <div class="dropdown mb-3" style="text-align: end">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Сортировать
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/services?sort=price_asc">Сортировать по цене вверх</a>
                                <a class="dropdown-item" href="/services?sort=price_desc">Сортировать по цене вниз</a>
                                <a class="dropdown-item" href="/services?sort=hours_asc">Сортировать по времени вверх</a>
                                <a class="dropdown-item" href="/services?sort=hours_desc">Сортировать по времени вниз</a>
                            </div>
                        </div>
                        <!-- Карточки услуг -->
                        <div class="row">
                            @foreach($events as $event)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        @if($event->image)
                                            <img src="{{ $event->image }}" class="card-img-top" alt="{{ $event->name }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->name }}</h5>
                                            <p class="card-text">{{ $event->description }}</p>
                                            <p class="card-text">Цена: BYN {{ $event->price }}</p>
                                            <p class="card-text">Время: {{ $event->hours }} часа</p>
                                            <!-- Кнопка вызова модального окна -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal" data-service="{{ $event->name }}">
                                                Заказать
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
        <script>
            // Инициализация ползунка для цены
            var priceSlider = document.getElementById('price-range');
            noUiSlider.create(priceSlider, {
                start: [{{ request()->get('min_price', $minPrice) }}, {{ request()->get('max_price', $maxPrice) }}],
                connect: true,
                range: {
                    'min': {{ $minPrice }},
                    'max': {{ $maxPrice }}
                },
                tooltips: [true, true],
                format: {
                    to: function (value) {
                        return value.toFixed(0);
                    },
                    from: function (value) {
                        return Number(value);
                    }
                }
            });

            priceSlider.noUiSlider.on('update', function (values, handle) {
                document.getElementById('min-price-display').innerText = '$' + values[0];
                document.getElementById('max-price-display').innerText = '$' + values[1];
                document.getElementById('min-price').value = values[0];
                document.getElementById('max-price').value = values[1];
            });

            // Инициализация ползунка для времени
            var hoursSlider = document.getElementById('hours-range');
            noUiSlider.create(hoursSlider, {
                start: [{{ request()->get('min_hours', $minHours) }}, {{ request()->get('max_hours', $maxHours) }}],
                connect: true,
                range: {
                    'min': {{ $minHours }},
                    'max': {{ $maxHours }}
                },
                tooltips: [true, true],
                format: {
                    to: function (value) {
                        return value.toFixed(0);
                    },
                    from: function (value) {
                        return Number(value);
                    }
                }
            });

            hoursSlider.noUiSlider.on('update', function (values, handle) {
                document.getElementById('min-hours-display').innerText = values[0] + ' часа';
                document.getElementById('max-hours-display').innerText = values[1] + ' часа';
                document.getElementById('min-hours').value = values[0];
                document.getElementById('max-hours').value = values[1];
            });
        </script>






        <!-- Модальное окно -->
        <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Бронирование услуги</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="bookingForm">
                            <div class="form-group">
                                <label for="serviceName">Название услуги</label>
                                <input type="text" class="form-control" id="serviceName" name="serviceName" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Ваше имя</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Ваш email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Ваш телефон</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Забронировать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <!-- Скрипты -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            $('#bookingModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Кнопка, которая вызвала модальное окно
                var serviceName = button.data('service'); // Извлечение информации из атрибута data-service
                var modal = $(this);
                modal.find('.modal-body #serviceName').val(serviceName);
            });

            $('#bookingForm').submit(function(event) {
                event.preventDefault();

                var formData = {
                    service_name: $('#serviceName').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ route("service-lead.store") }}',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        alert(response.success);
                        $('#bookingModal').modal('hide');
                    },
                    error: function(response) {
                        alert('Ошибка при отправке формы.');
                    }
                });
            });
        </script>

@include('includes.footer')

