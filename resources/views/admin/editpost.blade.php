@include('admin.includes.navadmin')
<div id="layoutSidenav">
    @include('admin/includes/sidebar')
    <div id="layoutSidenav_content">
        <div class="container mt-5">
            <h1>Редактировать пост</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.updatepost', $post->post_id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="post_title">Заголовок</label>
                    <input type="text" class="form-control" id="post_title" name="post_title"
                           value="{{ $post->post_title }}" required>
                </div>
                <div class="form-group">
                    <label for="post_img">Изображение</label>
                    <input type="text" class="form-control" id="post_img" name="post_img" value="{{ $post->post_img }}"
                           readonly>
                    <button type="button" class="btn btn-secondary mt-2" data-toggle="modal"
                            data-target="#attributeMediaLibraryModal">
                        Выбрать из медиабиблиотеки
                    </button>
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select class="form-control" id="category_id" name="category_id[]" multiple required>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->category_id }}" {{ in_array($category->category_id, $selectedCategories) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_sub_title">Подзаголовок</label>
                    <input type="text" class="form-control" id="post_sub_title" name="post_sub_title"
                           value="{{ $post->post_sub_title }}" required>
                </div>
                <div class="form-group">
                    <label for="post_content">Контент</label>
                    <textarea class="form-control" id="post_content" name="post_content"
                              required>{{ $post->post_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="post_date">Дата</label>
                    <input type="date" class="form-control" id="post_date" name="post_date"
                           value="{{ $post->post_date }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Обновить пост</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="attributeMediaLibraryModal" tabindex="-1" role="dialog"
     aria-labelledby="attributeMediaLibraryModalLabel" aria-hidden="true">
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
                            <img class="img-thumbnail attribute-media-item" src="{{ asset('storage/' . $file) }}" alt=""
                                 data-file-url="{{ asset('storage/' . $file) }}" onclick="selectImage(this)">
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
        const postImgInput = document.getElementById('post_img');
        postImgInput.value = imageUrl;
        $('#attributeMediaLibraryModal').modal('hide');
    }
</script>
