@include('admin/includes/navadmin')
<div id="layoutSidenav">
    @include('admin/includes/sidebar')
    <div id="layoutSidenav_content">
        <div class="container mt-5">
            <h1>Редактировать дом</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.update', $house->houseID) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $house->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Описание краткое</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $house->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price_at_day">Цена за ночь</label>
                    <input type="number" step="0.01" class="form-control" id="price_at_day" name="price_at_day" value="{{ $house->price_at_day }}" required>
                </div>
                <div class="form-group">
                    <label for="attributes">Атрибуты</label>
                    <input type="hidden" class="form-control" id="attributes" name="attributes" value="{{ $house->attributes }}" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#attributeLibraryModal">
                            Добавить атрибут
                        </button>
                    </div>
                    <div id="selected-attributes" class="mt-3">
                        @if (!empty($house->attributes))
                            @foreach(json_decode($house->attributes) as $attribute)
                                <div class="attribute-item mb-2">
                                    <img src="{{ $attribute->attribute1 }}" class="img-thumbnail m-2" style="width: 100px;">
                                    <input type="text" class="form-control m-2" value="{{ $attribute->attribute2 }}" placeholder="Введите текст" onchange="updateAttributes()">
                                    <button type="button" class="btn btn-danger m-2" onclick="this.parentElement.remove(); updateAttributes()">Удалить</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="images">Картинки</label>
                    <div class="input-group">
                        <textarea class="form-control d-none" id="images" name="images" rows="5" required>{{ $house->images }}</textarea>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#attributeMediaLibraryModal">
                                Выбрать из медиабиблиотеки
                            </button>
                        </div>
                    </div>
                    <div id="selected-images" class="mt-3">
                        @if (!empty($house->images))
                            @foreach(json_decode($house->images) as $image)
                                <div class="selected-image-container" style="position: relative; display: inline-block;">
                                    <img src="{{ $image }}" class="img-thumbnail m-2" style="width: 100px;">
                                    <button type="button" class="btn btn-danger btn-sm" style="position: absolute; top: 5px; right: 5px;" onclick="removeImage('{{ $image }}')">&times;</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>



                <div class="form-group">
                    <label for="long_description">Описание</label>
                    <textarea class="form-control" id="long_description" name="long_description">{{ $house->long_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить дом</button>
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







<div class="modal fade" id="attributeLibraryModal" tabindex="-1" role="dialog" aria-labelledby="attributeLibraryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attributeLibraryModalLabel">Медиабиблиотека для атрибута</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($files as $file)
                        <div class="col-3">
                            <img class="img-thumbnail attribute-library-item" src="{{ asset('storage/' . $file) }}" alt="" data-file-url="{{ asset('storage/' . $file) }}" onclick="selectAttributeImage(this)">
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
    let attributes = [];

    function selectAttributeImage(img) {
        const imageUrl = img.getAttribute('data-file-url');
        const selectedAttributesContainer = document.getElementById('selected-attributes');

        // Создаем элемент для нового атрибута
        const attributeElement = document.createElement('div');
        attributeElement.className = 'attribute-item mb-2';

        const imgElement = document.createElement('img');
        imgElement.src = imageUrl;
        imgElement.className = 'img-thumbnail m-2';
        imgElement.style.width = '100px';

        const inputElement = document.createElement('input');
        inputElement.type = 'text';
        inputElement.className = 'form-control m-2';
        inputElement.placeholder = 'Введите текст';
        inputElement.onchange = function() {
            updateAttributes();
        };

        const removeButton = document.createElement('button');
        removeButton.className = 'btn btn-danger m-2';
        removeButton.innerHTML = 'Удалить';
        removeButton.onclick = function() {
            attributeElement.remove();
            updateAttributes();
        };

        attributeElement.appendChild(imgElement);
        attributeElement.appendChild(inputElement);
        attributeElement.appendChild(removeButton);

        selectedAttributesContainer.appendChild(attributeElement);

        updateAttributes();
    }

    function updateAttributes() {
        const attributesContainer = document.getElementById('selected-attributes');
        const attributesArray = [];

        attributesContainer.querySelectorAll('.attribute-item').forEach(function(item) {
            const imgElement = item.querySelector('img');
            const inputElement = item.querySelector('input');
            attributesArray.push({
                attribute1: imgElement.src,
                attribute2: inputElement.value
            });
        });

        document.getElementById('attributes').value = JSON.stringify(attributesArray);
    }
</script>




<script>
    function selectImage(img) {
        const imageUrl = img.getAttribute('data-file-url');
        const imagesTextarea = document.getElementById('images');
        const selectedImagesContainer = document.getElementById('selected-images');

        // Добавляем URL выбранного изображения в текстовое поле в формате JSON
        let currentImages = imagesTextarea.value ? JSON.parse(imagesTextarea.value) : [];
        if (!currentImages.includes(imageUrl)) {
            currentImages.push(imageUrl);
            imagesTextarea.value = JSON.stringify(currentImages);

            // Создаем контейнер для изображения и кнопки удаления
            const imageContainer = document.createElement('div');
            imageContainer.className = 'selected-image-container';
            imageContainer.style.position = 'relative';
            imageContainer.style.display = 'inline-block';

            // Отображаем выбранное изображение
            const imgElement = document.createElement('img');
            imgElement.src = imageUrl;
            imgElement.className = 'img-thumbnail m-2';
            imgElement.style.width = '100px';

            // Создаем кнопку удаления
            const removeButton = document.createElement('button');
            removeButton.className = 'btn btn-danger btn-sm';
            removeButton.innerHTML = '&times;';
            removeButton.style.position = 'absolute';
            removeButton.style.top = '5px';
            removeButton.style.right = '5px';
            removeButton.onclick = function() {
                removeImage(imageUrl);
            };

            imageContainer.appendChild(imgElement);
            imageContainer.appendChild(removeButton);
            selectedImagesContainer.appendChild(imageContainer);
        }
    }

    function removeImage(imageUrl) {
        const imagesTextarea = document.getElementById('images');
        const selectedImagesContainer = document.getElementById('selected-images');

        // Удаляем URL изображения из текстового поля
        let currentImages = imagesTextarea.value ? JSON.parse(imagesTextarea.value) : [];
        currentImages = currentImages.filter(url => url !== imageUrl);
        imagesTextarea.value = JSON.stringify(currentImages);

        // Удаляем соответствующий контейнер изображения
        const imageContainers = selectedImagesContainer.getElementsByClassName('selected-image-container');
        for (let container of imageContainers) {
            const imgElement = container.getElementsByTagName('img')[0];
            if (imgElement.src === imageUrl) {
                container.remove();
                break;
            }
        }
    }
</script>

