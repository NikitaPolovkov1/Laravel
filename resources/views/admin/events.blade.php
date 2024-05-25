@include('admin.includes.navadmin')
<div id="layoutSidenav">
    @include('admin.includes.sidebar')
    <div id="layoutSidenav_content">
        <div class="container mt-5">
            <h1>Список услуг</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Добавить услугу</a>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Часы</th>
                    <th>Описание</th>
                    <th>Изображение</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->price }}</td>
                        <td>{{ $event->hours }}</td>
                        <td>{{ $event->description }}</td>
                        <td>
                            @if($event->image)
                                <img src="{{ $event->image }}" alt="{{ $event->name }}" width="100">
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту услугу?');">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
