@include('admin/includes/navadmin')
<div id="layoutSidenav">
    @include('admin/includes/sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Дома</div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div>
                                                    <h5 class="mb-0">Заявки</h5>
                                                </div>
                                                <button id="addCategoryBtn" class="btn btn-primary text-white">
                                                    Добавить категорию
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table id="categoryTable" class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Название</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Управление</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($categories as $category)
                                                        <tr>
                                                            <td>
                                                                <input type="text" value="{{ $category->category_name }}"></td>
                                                            <td>
                                                                <a href="" class="text-secondary font-weight-bold text-xs delete-category" data-toggle="tooltip" data-original-title="Delete category" data-category-id="{{$category->category_id}}">
                                                                    Удалить
                                                                </a>
                                                            </td>

                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</div>


<script>
    $(document).ready(function() {
        // Обработка нажатия на кнопку "Добавить категорию"
        $('#addCategoryBtn').click(function () {
            // Создание строки для создания новой категории
            var newRow = '<tr id="newCategoryRow">' +
                '<td>' +
                '<input type="text" class="form-control" name="new_category_name" placeholder="Введите название категории">' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-primary btn-sm" id="saveNewCategoryBtn">Сохранить</button>' +
                '</td>' +
                '</tr>';
            // Добавление строки в таблицу
            $('#categoryTable tbody').append(newRow);
        });

        $(document).on('click', '#saveNewCategoryBtn', function(){
            var categoryName = $('input[name="new_category_name"]').val();
            // Отправка AJAX-запроса для сохранения новой категории
            $.ajax({
                url: '{{ route("admin.categories.store") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "category_name": categoryName
                },
                success: function(data){
                    // Обновление страницы после успешного сохранения категории
                    window.location.reload();
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        // Обработка нажатия на кнопку "Удалить"
        $(document).on('click', '.delete-category', function(e){
            e.preventDefault(); // Предотвращаем переход по ссылке по умолчанию

            var categoryId = $(this).data('category-id'); // Получаем идентификатор категории из атрибута data-category-id

            if (confirm("Вы уверены, что хотите удалить эту категорию?")) {
                $.ajax({
                    url: '/admin/categories/' + categoryId, // URL для удаления категории
                    type: 'DELETE', // HTTP-метод DELETE
                    data: {
                        "_token": "{{ csrf_token() }}" // Токен CSRF для защиты от межсайтовой подделки запросов
                    },
                    success: function(data){
                        // Обновляем страницу после успешного удаления категории
                        window.location.reload();
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText); // Выводим сообщение об ошибке в консоль
                    }
                });
            }
        });
    });
</script>

