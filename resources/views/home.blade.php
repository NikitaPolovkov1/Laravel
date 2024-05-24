@include('includes.header')

<div class="container">
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Выход
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{Auth::user()->foto}}" alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{Auth::user()->name}}</h5>
                        <p class="text-muted mb-1">{{Auth::user()->email}}</p>
                        <div class="mb-2">
                            <form action="/upload" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="file">
                                    <button type="submit" id="uploadButton" class="btn btn-primary">Загрузить файл</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Полное имя:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{Auth::user()->name}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Номер телефона</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{Auth::user()->phone}}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <h2>История бронирования</h2>
                <div class="row p-3">

                    @if(Auth::user()->bookings_last)
                        @php
                            $bookings = json_decode(Auth::user()->bookings_last, true);
                        @endphp
                        @if(is_array($bookings))
                            @foreach($bookings as $key => $booking)
                                <div class="card mt-2 mr-3">
                                    <div class="card-body">
                                        <p>Номер телефона: {{ $booking['phone_number'] }}</p>
                                        <p>Электронная почта: {{ $booking['email'] }}</p>
                                        <p>Дата прибытия: {{ $booking['arrival_date'] }}</p>
                                        <p>Дата отъезда: {{ $booking['departure_date'] }}</p>
                                        <p>Количество детей: {{ $booking['children_count'] }}</p>
                                        <p>Количество взрослых: {{ $booking['adult_count'] }}</p>
                                        <p>Тариф: {{ $booking['tariff'] }}</p>
                                        <p>Цена за день: {{ $booking['price_at_day'] }}</p>
                                        <p>Количество ночей: {{ $booking['nights_count'] }}</p>
                                        <p>Общая цена: {{ $booking['total_price'] }}</p>
                                        <div class="alert alert-warning">Статус заявки: {{ $booking }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Нет данных о бронировании</p>
                        @endif
                    @else
                        <p>Нет данных о бронировании</p>
                    @endif



                </div>


                <form action="{{ route('updateLogin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="new_login">Новый логин</label>
                        <input type="text" class="form-control" id="new_login" name="new_login" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить логин</button>
                </form>


                <form action="{{ route('updatePassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Текущий пароль</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Новый пароль</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить пароль</button>
                </form>

            </div>
        </div>
    </div>
</section>









@include('includes.footer')
