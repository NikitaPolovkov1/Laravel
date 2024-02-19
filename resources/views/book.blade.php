<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activitar | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href=" {{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('')}}css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<section class="price-section spad set-bg" data-setbg="http://127.0.0.1:8000/Images/img_14.png" style="background-image: url(&quot;http://127.0.0.1:8000/Images/img_14.png&quot;);">
    <div class="container">
        <div class="row">
            <!-- Your Room Blocks Here -->
            <div class="col-lg-4">
                <div class="single-price-plan"  style="padding-top: 0">
                    <img src="{{asset('Images/img_4.png')}}" alt="">
                    <h4 onClick="MyFunc2(this);">Отдельный дом</h4>
                    <div class="price-plan">
                        <h2>55 <span>$</span></h2>
                        <p>день</p>
                    </div>
                    <ul>
                        <li>Включает завтрак обед и ужин</li>
                        <li>1 classes per week</li>
                        <li>FREE drinking package</li>
                        <li>1 Free personal training</li>
                    </ul>
                    <!-- Add onClick event handler to call MyFunc() -->
                    <a href="#" class="primary-btn price-btn" onClick="MyFunc(this)">Забронировать</a>
                    <div class="form_popup_info">
                        <img src="{{asset('Images/img_4.png')}}" alt="">
                        <h4>Отдельный дом</h4>
                        <div class="price-plan">
                            <h2>55 <span>$</span></h2>
                            <p>день</p>
                        </div>
                        <ul>
                            <li>Включает завтрак обед и ужин</li>
                            <li>1 classes per week</li>
                            <li>FREE drinking package</li>
                            <li>1 Free personal training</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-price-plan" style="padding-top: 0">
                    <img src="{{asset('Images/img_4.png')}}" alt="">
                    <h4 >sdfsf дом</h4>
                    <div class="price-plan">
                        <h2>55 <span>$</span></h2>
                        <p>день</p>
                    </div>
                    <ul>
                        <li>Включает завтрак обед и ужин</li>
                        <li>1 classes per week</li>
                        <li>FREE drinking package</li>
                        <li>1 Free personal training</li>
                    </ul>
                    <!-- Add onClick event handler to call MyFunc() -->
                    <a href="#" class="primary-btn price-btn" onClick="MyFunc(this)">Забронировать</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-price-plan" style="padding-top: 0">
                    <img src="{{asset('Images/img_4.png')}}" alt="">
                    <h4>sdfsf дом</h4>
                    <div class="price-plan">
                        <h2>55 <span>$</span></h2>
                        <p>день</p>
                    </div>
                    <ul>
                        <li>Включает завтрак обед и ужин</li>
                        <li>1 classes per week</li>
                        <li>FREE drinking package</li>
                        <li>1 Free personal training</li>
                    </ul>
                    <!-- Add onClick event handler to call MyFunc() -->
                    <a href="#" class="primary-btn price-btn" onClick="MyFunc(this)">Забронировать</a>
                </div>
            </div>
            <!-- End of Room Blocks -->
        </div>
    </div>
</section>

<div class="checkout_form">

</div>

<script>
    function MyFunc2(element) {
        // Get data from the room block
        var roomBlock = $(element).closest('.single-price-plan');
        roomBlock.find('.form_popup_info').toggleClass('active_popup');
    }
    function MyFunc(button) {
        var roomBlock = $(button).closest('.single-price-plan');
        var roomNumber = roomBlock.find('').text();
        var price = roomBlock.find('.price-plan h2').text();
        var amenities = roomBlock.find('ul').html();
        var imageURL = roomBlock.find('img').attr('src'); // Get the image URL


        // Create checkout form HTML
        var checkoutFormHTML = `
            <<img src="${imageURL}" alt="${roomNumber}">
            <h2>${roomNumber}</h2>
            <h3>${price}</h3>
            <ul>${amenities}</ul>
        `;

        // Insert checkout form HTML into .checkout_form element
        $('.checkout_form').html(checkoutFormHTML);
        $('.container').addClass('cont_active');
        // Show checkout form
        $('.checkout_form').addClass('checkout_form_active');
    }
</script>

<style>
    .form_popup_info{
        display: none;
    }
    .active_popup{
        display: block;
    }


    .checkout_form{
        width: 400px;
        height: 600px;
        border-radius: 30px;
        position: fixed;
        right: -1000px;
        top:300px;
        z-index: 100;
        background-color: #FFF;
        transition: .6s;
    }

    .checkout_form_active{
        right: 0;
        transition: .6s;
    }

    .container {
        position: relative;
        right: 0;
        transition: right 0.6s ease;
    }

    .cont_active {
        right: 200px;
    }
</style>





<!-- Js Plugins -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>

</html>
