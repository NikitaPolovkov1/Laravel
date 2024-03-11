@include('includes/header')
<!-- Blog Section Begin -->

<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row blog-gird">
            @foreach($posts as $post)
                <div class="grid-sizer"></div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item large-item set-bg" data-setbg="img/blog/blog-1.jpg">
                        <a href="/blog/{{$post->post_id}}" class="blog-text">
                            <div class="categories">{{$post->post_title}}</div>
                            <h5>{{$post->post_sub_title}}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="blog-option">
            <div class="blog-pagination">
                <a href="#" class="active">1</a>
                of
                <a href="#">3</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
            </div>
            <div class="blog-option-right">
                <div class="blog-result">Showing 1–3 of 12 results</div>
                <div class="show-result">
                    <p>Show:</p>
                    <select class="show-result-select">
                        <option value="">09</option>
                        <option value="">19</option>
                        <option value="">29</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

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

@include('includes/footer')
