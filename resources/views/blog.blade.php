@include('includes/header')
<!-- Blog Section Begin -->

<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Блог</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <button class="btn btn-dark m-2"><a style="color: #FFF;" href="/blog/category={{$category->category_name}}">{{$category->category_name}}</a></button>
            @endforeach
            @if(url()->current() !== "http://127.0.0.1:8000/blog")
                <button class="btn btn-dark m-2"><a style="color: #FFF;" href="/blog">Все посты</a></button>
                @endif
        </div>
        <div class="row blog-gird mt-5">
            @foreach($posts as $post)
                <div class="grid-sizer"></div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item large-item set-bg" data-setbg="{{$post->post_img}}">
                        <a href="/blog/{{$post->post_id}}" class="blog-text">
                            <div class="categories">{{$post->post_title}}</div>
                            <h5>{{$post->post_sub_title}}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @if(count($posts) > 3)
        <div class="blog-option">
            <div class="blog-pagination">

                {{ $posts->onEachSide(1)->links('vendor.pagination.custom') }}

            </div>
            <div class="blog-option-right">
                <div class="blog-result">Показаны {{$posts->first()->post_id}} - {{$posts->last()->post_id}} из {{count($posts_all)}} постов</div>
                <div class="show-result">
                    <p>Show:</p>
                    <select class="show-result-select" onchange="changePerPage(this)">
                        <option value="3" {{ $posts->perPage() == 3 ? 'selected' : '' }}>03</option>
                        <option value="6" {{ $posts->perPage() == 6 ? 'selected' : '' }}>06</option>
                        <option value="9" {{ $posts->perPage() == 9 ? 'selected' : '' }}>09</option>
                    </select>
                </div>

            </div>
        </div>
        @endif
    </div>
</section>
<!-- Blog Section End -->

@include('includes/footer')
