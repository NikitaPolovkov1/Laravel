@include('includes.header')
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Выход
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

<div class="container mt-5 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{Auth::user()->name}}

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @foreach(json_decode(Auth::user()->bookings_last, true)['bookings'] as $booking)
                <div class="card mt-2 mb-2">
                    <div class="card-header"> Property Name: {{ $booking['property_name'] }} <br></div>

                    <div class="card-body">
                        Rate: {{ $booking['rate'] }} <br>
                        Check-in Date: {{ $booking['check_in_date'] }} <br>
                        Check-out Date: {{ $booking['check_out_date'] }} <br>

                        Price: ${{ $booking['price'] }} <br><br>

                    </div>
                </div>
                @endforeach

        </div>
    </div>
</div>













@include('includes.footer')
