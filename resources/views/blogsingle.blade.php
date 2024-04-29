@include('includes/header')

<!-- Blog Single Section Begin -->
<section class="blog-single-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-single-text">
                    <div class="blog-text">
                      <p>{!!$post->post_content  !!}</p>
                    </div>

                    <div class="blog-tag-share">
                        <div class="tags">
                            @foreach($categories as $category)
                                <a href="#">{{$category->category_name}}</a>
                            @endforeach

                        </div>
                        <div class="social-share">
                            <span>Share:</span>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-single-sidebar">
                    <div class="bs-latest-news">
                        <h4>Последние новости</h4>

                        @foreach($posts_lastest as $post)
                            <a href="{{$post->post_id}}" class="bl-item set-bg">
                                <h5>  {{$post->post_title}}</h5>
                                <span>{{$post->post_date}}</span>
                            </a>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recent-news">
                    <h4>Последние новости</h4>
                    <div class="row">
                        @foreach($posts_lastest as $post)

                            <div class="col-lg-4">
                                <div class="recent-item set-bg" data-setbg="/{{$post->post_img}}">
                                    <a href="/blog/{{$post->post_id}}" class="recent-text">
                                        <div class="categories">{{$post->post_title}}</div>
                                        <h5>{{$post->post_sub_title}}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Single Section End -->


<style>
    h1, h2, h3, h4, h5, h6{
        color: #FFF;
    }
</style>

@include('includes/footer')
