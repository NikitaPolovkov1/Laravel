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
                                                <a href="/admin/addpost" class="btn btn-primary text-white">
                                                    Добавить пост
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Фото</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Название</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Цена за ночь</th>
                                                        <th class="text-secondary opacity-7"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($posts as $post)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <img class="" style="max-width: 200px" src="/{{$post->post_img}}" alt="{{$post->post_title}}">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">{{$post->post_title}}</p>
                                                                <p class="text-xs text-muted mb-0">{{$post->post_sub_title}}</p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="badge badge-sm bg-gradient-success">{{$post->post_date}}</span>
                                                            </td>
                                                            <td class="align-middle">
                                                                <a href="/admin/editpost/{{$post->post_id}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Изменить пост">
                                                                    Изменить
                                                                </a>
                                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs delete-post" data-toggle="tooltip" data-original-title="Delete post" data-post-id="{{ $post->post_id }}">
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
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-post').forEach(function (element) {
            element.addEventListener('click', function () {
                const postId = this.getAttribute('data-post-id');
                if (confirm('Вы уверены, что хотите удалить этот пост?')) {
                    fetch(`/admin/deletepost/${postId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Пост успешно удален') {
                                location.reload();
                            } else {
                                alert('Ошибка при удалении поста');
                            }
                        })
                        .catch(error => console.error('Ошибка:', error));
                }
            });
        });
    });
</script>

