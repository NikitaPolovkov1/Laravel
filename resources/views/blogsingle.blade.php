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
                        @for($i = 0; $i < 2; $i+=1)
                            <a href="{{$posts[$i]->post_id}}" class="bl-item set-bg">
                                <h5>  {{$posts[$i]->post_title}}</h5>
                                <span>{{$posts[$i]->post_date}}</span>
                            </a>

                        @endfor
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recent-news">
                    <h4>Последние новости</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="recent-item set-bg" data-setbg="img/recent-1.jpg">
                                <a href="#" class="recent-text">
                                    <div class="categories">Gym & Croosfit</div>
                                    <h5>Many people sign up for affiliate programs</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="recent-item set-bg" data-setbg="img/recent-2.jpg">
                                <a href="#" class="recent-text">
                                    <div class="categories">Gym & Croosfit</div>
                                    <h5>Many people sign up for affiliate programs</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="recent-item set-bg" data-setbg="img/recent-3.jpg">
                                <a href="#" class="recent-text">
                                    <div class="categories">Gym & Croosfit</div>
                                    <h5>Many people sign up for affiliate programs</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Single Section End -->

<!-- Cta Section Begin -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-text">
                    <h3>GeT Started Today</h3>
                    <p>New student special! $30 unlimited Gym for the first week anh 50% of our member!</p>
                </div>
                <a href="#" class="primary-btn cta-btn">book now</a>
            </div>
        </div>
    </div>
</section>
<!-- Cta Section End -->

<style>
    h1, h2, h3, h4, h5, h6{
        color: #FFF;
    }
</style>

@include('includes/footer')
