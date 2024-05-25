@include('admin/includes/navadmin')
<div id="layoutSidenav">
    @include('admin/includes/sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Панель управления</h1>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Типы</div>
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
                                                <button id="addTypeBtn" class="btn btn-primary text-white">
                                                    Добавить тип
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table id="typeTable" class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Название</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Управление</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($types as $type)
                                                        <tr>
                                                            <td>
                                                                <input type="text" value="{{ $type->name }}"></td>
                                                            <td>
                                                                <a href="" class="text-secondary font-weight-bold text-xs delete-type" data-toggle="tooltip" data-original-title="Delete type" data-type-id="{{$type->id}}">
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
        // Обработка нажатия на кнопку "Добавить тип"
        $('#addTypeBtn').click(function () {
            // Создание строки для создания нового типа
            var newRow = '<tr id="newTypeRow">' +
                '<td>' +
                '<input type="text" class="form-control" name="new_type_name" placeholder="Введите название типа">' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-primary btn-sm" id="saveNewTypeBtn">Сохранить</button>' +
                '</td>' +
                '</tr>';
            // Добавление строки в таблицу
            $('#typeTable tbody').append(newRow);
        });

        $(document).on('click', '#saveNewTypeBtn', function(){
            var typeName = $('input[name="new_type_name"]').val();
            // Отправка AJAX-запроса для сохранения нового типа
            $.ajax({
                url: '{{ route("admin.types.store") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "type_name": typeName
                },
                success: function(data){
                    // Обновление страницы после успешного сохранения типа
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
        $(document).on('click', '.delete-type', function(e){
            e.preventDefault(); // Предотвращаем переход по ссылке по умолчанию

            var typeId = $(this).data('type-id'); // Получаем идентификатор типа из атрибута data-type-id

            if (confirm("Вы уверены, что хотите удалить этот тип?")) {
                $.ajax({
                    url: '/admin/types/' + typeId, // URL для удаления типа
                    type: 'DELETE', // HTTP-метод DELETE
                    data: {
                        "_token": "{{ csrf_token() }}" // Токен CSRF для защиты от межсайтовой подделки запросов
                    },
                    success: function(data){
                        // Обновляем страницу после успешного удаления типа
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
