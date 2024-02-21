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
<section class="price-section spad set-bg"  style="background-color: black">
    <div class="container">
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-lg-6">
                    <div class="single-price-plan"  style="padding-top: 0">
                        <div class="about-img">
                            <section class="hero-section">
                                <div class="hero-items owl-carousel">

                                    @foreach(json_decode($room->room_images) as $image)
                                        <div class="single-hero-item set-bg" style="max-height: 400px" data-setbg="{{asset($image)}}">

                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                        <div class="" style="padding: 20px">
                            <h2 style="padding: 20px 0px; text-align: start " >{{$room->room_name}}</h2>
                            <div class="" style="text-align: start">
                                <p>Цена: {{$room->price_at_hour}}BYN за ночь</p>
                            </div>
                            <ul class="attributes_room">
                                @foreach(json_decode($room->room_attributes) as $room_attribute)
                                    <li style="display: flex">
                                        <img style="width: 20px" src="{{ $room_attribute->image}}" alt="">
                                        <p>{{ $room_attribute->text }}</p>
                                    </li>
                                @endforeach

                            </ul>
                            <p style="text-align: start">{{$room->room_description}}</p>
                            <a style="text-align: start"  onClick="MyFunc2();">Посмотрите в 3D</a>
                            <br>
                            <!-- Add onClick event handler to call MyFunc() -->
                            <a href="#" class="primary-btn price-btn" onClick="MyFunc(this)">Забронировать</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End of Room Blocks -->
        </div>
    </div>
</section>

<div class=" threed_cont">
    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ornare ante justo, at placerat ante sagittis at. Nunc laoreet consequat ligula vitae ornare. Nam hendrerit elit urna, id tristique nisl aliquet pharetra. Proin sit amet nisl dui. Donec turpis mauris, convallis ultricies vestibulum et, auctor id eros. Aenean neque lectus, rutrum nec massa posuere, varius ultricies risus. Sed eleifend neque mauris, eu sagittis nulla ullamcorper non. Etiam luctus tristique felis, vitae sollicitudin felis varius et. Aenean vitae libero nec dolor tempor facilisis vitae vitae lacus. Morbi tristique pellentesque velit id sodales. Etiam in dapibus ipsum, ac suscipit tellus. Maecenas vel urna a tellus venenatis blandit vel in felis. Maecenas molestie lacinia ex eget interdum. Nulla facilisi. Praesent mi lorem, venenatis vel urna a, ullamcorper interdum lectus. Maecenas justo ante, gravida at nulla ac, consectetur rutrum leo. </div>
    <canvas class="webgl"></canvas>
    <a class="close_threed" onclick="MyFunc3()"><img src="{{asset('Icons/close.png')}}" alt=""></a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r124/three.min.js"></script>
<script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>
<script src="https://unpkg.com/three@0.126.0/examples/js/controls/OrbitControls.js"></script>


<div class="checkout_form">
    <img src="" alt="">
    <h2></h2>
    <h3></h3>
    <div class="single-price-plan">
        <ul></ul>
    </div>

</div>

<div id="room-data" data-rooms='<?php echo json_encode($rooms); ?>'></div>

<script>
    // Получить данные из атрибута data-rooms
    var roomsData = document.getElementById('room-data').getAttribute('data-rooms');
    var rooms = JSON.parse(roomsData)
</script>


<script>

    function func3(){
        var rooms = <?php echo $rooms; ?>;

        console.log(rooms);
    }

    function MyFunc2(element) {
        $('.threed_cont').toggleClass('active_webdl');
    }
    function MyFunc3(){
        $('.threed_cont').removeClass('active_webdl');
    }
    function MyFunc(button) {
        var roomBlock = $(button).closest('.single-price-plan');
        var roomNumber = roomBlock.find('h4').text();
        var price = roomBlock.find('.price-plan h2').text();
        var amenities = roomBlock.find('ul').html();
        var imageURL = roomBlock.find('.single-hero-item').attr('data-setbg');


        // Create checkout form HTML
        var checkoutFormHTML = `
            <img src="${imageURL}" alt="${roomNumber}">
            <h2>${roomNumber}</h2>
            <h3>${price}</h3>
            <div class="single-price-plan">
            <ul>${amenities}</ul>
            </div>
        `;

        // Insert checkout form HTML into .checkout_form element
        $('.checkout_form').html(checkoutFormHTML);
        $('.container').addClass('cont_active');
        $('.container').css({'max-width' : '780px'});
        $('.col-lg-6').css({'width' : '100%', 'max-width': '100%'});
        // Show checkout form
        $('.checkout_form').addClass('checkout_form_active');
    }
</script>

<style>
    .form_popup_info{
        display: none;
    }

    .popup_back{
        display: none;
    }
    .popup_back_active{
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 101;
    }
    .active_popup{
        display: block;
        position: fixed;
        top: 50%;
        right: 25%;
        transform: translate(-50%, -50%);
        padding-top: 100px;
        width: 100%;
        max-width: 1200px;
        height: 100%;
        z-index: 104;
    }


    .checkout_form{
        width: 800px;
        height: 700px;
        border-radius: 30px;
        position: fixed;
        right: -1000px;
        top: 90px;
        z-index: 100;
        background-color: #FFF;
        transition: .6s;
    }

    .checkout_form_active{
        right: 50px;
        transition: .6s;
    }

    .container {
        position: relative;
        right: 0;
        transition: right 0.6s ease;
    }

    .cont_active {
        right: 450px;
    }

    .attributes_room{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .attributes_room li{
        align-items: center;
        gap: 10px;
        border: 1px solid #8f8fa8;
        border-radius: 5px;
        padding: 10px;
    }

    .attributes_room li p{
       margin: 0;
    }

    .threed_cont{
        display: none;

    }




    .webgl{
        position: fixed;
        z-index: 105;
        top: 50%;
        right: 200px;
        transform: translateY(-50%);
        display: block;
    }

    .active_webdl{
        display: block;
        position: fixed;
        z-index: 200;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: black;
        overflow: hidden;
    }

    .threed_cont .text{
        position: absolute;
        top: 50%;
        left: 200px;
        color: #FFF;
        width: 500px;
        z-index: 201;
        transform: translateY(-50%);
    }

    .close_threed{
        position: absolute;
        top: 50px;
        right: 50px;
    }
    .close_threed img{
        width: 30px;
    }


</style>


<script>
    const canvas = document.querySelector('.webgl')
    const scene = new THREE.Scene()
    const textureLoader = new THREE.TextureLoader()
    const sizes = {
        width: 800,
        height: 600
    }

    // Base camera
    const camera = new THREE.PerspectiveCamera(10, sizes.width / sizes.height, 0.1, 100)
    camera.position.x = 18
    camera.position.y = 8
    camera.position.z = 20
    scene.add(camera)

    //Controls
    const controls = new THREE.OrbitControls(camera, canvas)
    controls.enableDamping = true
    controls.enableZoom = true
    controls.enablePan = false
    controls.minDistance = 20
    controls.maxDistance = 40
    controls.minPolarAngle = Math.PI / 4
    controls.maxPolarAngle = Math.PI / 2
    controls.minAzimuthAngle = - Math.PI / 80
    controls.maxAzimuthAngle = Math.PI / 2.5

    // Renderer
    const renderer = new THREE.WebGLRenderer({
        canvas: canvas,
        antialias: true,
        alpha: true
    })

    renderer.setSize(sizes.width, sizes.height)
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
    renderer.outputEncoding = THREE.sRGBEncoding

    // Materials
    const bakedTexture = textureLoader.load('https://rawcdn.githack.com/ricardoolivaalonso/ThreeJS-Room05/ae27bdffd31dcc5cd5a919263f8f1c6874e05400/baked.jpg')
    bakedTexture.flipY = false
    bakedTexture.encoding = THREE.sRGBEncoding

    const bakedMaterial = new THREE.MeshBasicMaterial({
        map: bakedTexture,
        side: THREE.DoubleSide,
    })

    //Loader
    const loader = new THREE.GLTFLoader()
    loader.load('https://rawcdn.githack.com/ricardoolivaalonso/ThreeJS-Room05/ae27bdffd31dcc5cd5a919263f8f1c6874e05400/model.glb',
        (gltf) => {
            const model = gltf.scene
            model.traverse( child => child.material = bakedMaterial )
            scene.add(model)
        },
        ( xhr ) => {
            console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' )
        }
    )


    window.addEventListener('resize', () =>
    {
        sizes.width = window.innerWidth
        sizes.height = window.innerHeight
        camera.aspect = sizes.width / sizes.height
        camera.updateProjectionMatrix()
        renderer.setSize(sizes.width, sizes.height)
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
    })
    // Animation
    const tick = () => {
        controls.update()
        renderer.render(scene, camera)
        window.requestAnimationFrame(tick)
    }

    tick()
</script>


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
