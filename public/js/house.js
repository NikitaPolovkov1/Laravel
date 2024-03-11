$('input[name="daterange"]').on("input", function() {
    checkAvailability();
});


$('#phone1').inputmask("+375 (99) 999-99-99");



//Date range picker
$('input[name="daterange"]').daterangepicker({
    "showDropdowns": true,
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Применить",
        "cancelLabel": "Отмена",
        "fromLabel": "С",
        "toLabel": "По",
        "customRangeLabel": "Custom",
        "weekLabel": "Н",
        "daysOfWeek": [
            "Вс",
            "Пн",
            "Вт",
            "Ср",
            "Чт",
            "Пт",
            "Сб"
        ],
        "monthNames": [
            "Январь",
            "Февраль",
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Сентябрь",
            "Октябрь",
            "Ноябрь",
            "Декабрь"
        ],
        "firstDay": 1
    },
    "startDate": "02/16/2024",
    "endDate": "02/22/2024"
}, function(start, end, label) {
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});

var js_var = document.getElementById("my_var").value;
var dataObject = JSON.parse(js_var);
//Function check free date
function checkAvailability() {
    var dateRange = document.getElementById('daterange').value;
    var startDate = new Date(dateRange.split(' - ')[0]);
    var endDate = new Date(dateRange.split(' - ')[1]);

    var isAvailable = true;
    var bookedDates = [];

    dataObject.forEach((data) => {
        if (data.houseID == 1) {


            var dataStartDate = new Date(data.start_date);
            var dataEndDate = new Date(data.end_date);

            if ((startDate >= dataStartDate && startDate <= dataEndDate) || (endDate >= dataStartDate && endDate <= dataEndDate)) {
                isAvailable = false;
                bookedDates.push(data.start_date + ' - ' + data.end_date);
            }
            if (startDate <= dataEndDate && endDate >= dataStartDate) {
                isAvailable = false;
                bookedDates.push(data.start_date + ' - ' + data.end_date);
            }
        }
    });

    if (isAvailable) {
        document.getElementById('dateHelp').innerHTML = 'Дата доступна для бронирования';
    } else {
        document.getElementById('dateHelp').innerHTML = 'Дата недоступна для бронирования';
    }
}


//Open popup
function MyFunc2(element) {
    $('.threed_cont').toggleClass('active_webdl');
}
//Close popup
function MyFunc3(){
    $('.threed_cont').removeClass('active_webdl');
}

//Three js
const canvas = document.querySelector('.webgl')
const scene = new THREE.Scene()
const textureLoader = new THREE.TextureLoader()
const sizes = {
    width: 600,
    height:600
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
