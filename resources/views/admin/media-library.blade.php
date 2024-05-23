
@include('admin/includes/navadmin')
<div id="layoutSidenav">
    @include('admin/includes/sidebar')
    <div id="layoutSidenav_content">
        <div class="container">
            <h1>Медиабиблиотека</h1>


            <div class="row">
            <form action="{{ route('media.library.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="file">Загрузить изображение</label>
                    <input type="file" name="file" id="file" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Загрузить</button>
            </form>
            </div>


            <div class="row">
            @foreach ($files as $file)
                <div class="col-1">
                    <!-- Выводим ссылку на файл -->
                    <img class="w-100" src="{{ asset('storage/' . $file) }}" alt="">
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
