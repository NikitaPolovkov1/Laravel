@include('admin.includes.navadmin')
<div id="layoutSidenav">
    @include('admin.includes.sidebar')
    <div id="layoutSidenav_content">
        <div class="container mt-5">
            <h1>Добавить услугу</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                </div>
                <div class="form-group">
                    <label for="hours">Часы</label>
                    <input type="text" class="form-control" id="hours" name="hours" value="{{ old('hours') }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="text" class="form-control" id="image" name="image" readonly>
                    <button type="button" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#attributeMediaLibraryModal">
                        Выбрать из медиабиблиотеки
                    </button>
                </div>
                <button type="submit" class="btn btn-primary">Добавить услугу</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="attributeMediaLibraryModal" tabindex="-1" role="dialog" aria-labelledby="attributeMediaLibraryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attributeMediaLibraryModalLabel">Медиабиблиотека для атрибута</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($files as $file)
                        <div class="col-3">
                            <img class="img-thumbnail attribute-media-item" src="{{ asset('storage/' . $file) }}" alt="" data-file-url="{{ asset('storage/' . $file) }}" onclick="selectImage(this)">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script>
    function selectImage(img) {
        const imageUrl = img.getAttribute('data-file-url');
        const imageInput = document.getElementById('image');
        imageInput.value = imageUrl;
        $('#attributeMediaLibraryModal').modal('hide');
    }
</script>
