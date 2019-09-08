<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Vòng Xoay May Mắn - Fasttrack SE">
    <meta property="fb:app_id" content="440188856766559" />
    <meta property="og:description" content="Quay là trúng - Chương trình vòng xoay may mắn , giảm đến 30% học phí 3 tháng khóa lập trình viên 16 tháng.">
    <meta property="og:image" content="{{asset('images/vong-xoay-may-man.png')}}" />
    <meta property="og:url" content="https://itf.edu.vn/">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Vòng quay may mắn - Quay liền tay rinh ngày học bổng cùng Fasttrack SE</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css" />
    <script type="text/javascript" src="{{asset('js/Winwheel.js')}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="threed">VÒNG QUAY LIÊN MINH<h1>
                </div>
                <div class="col-md-6">
                    <div class="the_wheel">
                        <canvas id="canvas" width="380" height="380" data-responsiveMinWidth="300" data-responsiveScaleHeight="true" data-responsiveMargin="50">
                            <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                        </canvas>
                        <div class="power_controls spinner">
                            <a  onclick="secondWheel.stopAnimation(false); secondWheel.rotationAngle=0; secondWheel.draw(); drawTriangle2();  calculatePrizeOnServer();" ></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row wrapper-gift">
                        <div class="col-md-12">
                            <h2 class="tips">LỊCH SỬ QUAY GẦN ĐÂY</h2>
                        </div>
                        <table class="table table-bordered text-center">
                            <thead class="text-warning">
                                <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Quà nhận được</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày</th>
                                </tr>
                            </thead>
                            <tbody  class="text-white">
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                </tr>
                                <tr>
                                <th scope="row">4</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="gift">
            <div class="container">
                <div class="col-md-12 text-light pt-5">
                    <h2 class="title text-center">THỂ LỆ CHƯƠNG TRÌNH</h2>
                    <p>Mô tả về vòng quay và phần thưởng</p>

                    <p>Mô tả về vòng quay và phần thưởng</p>

                    <p>Mô tả về vòng quay và phần thưởng</p>

                    <p>Mô tả về vòng quay và phần thưởng</p>

                    <p>Mô tả về vòng quay và phần thưởng</p>

                </div>
            </div>
        </div>
    </div>
    <script>
        // Create new wheel object specifying the parameters at creation time.
        let secondWheel = new Winwheel({
        'drawMode'        : 'image',
        'drawText'        : true,
        'numSegments' : 8,
        'outerRadius' : 250,
        'canvasId'    : 'canvas',

        'animation' :
        {
            'type'          : 'spinToStop',
            'duration'      : 10,
            'spins'         : 10,
            'callbackSound' : playSound,
            'soundTrigger'  : 'pin',
            'callbackAfter' : 'drawTriangle2()'
        },
        'pins' :
        {
            'number'      : 16,
            'outerRadius' : 0,
            'margin'      : 0,
            'fillStyle'   : '#ffe714',
            'strokeStyle' : '#ffffff'
        }

    });

    let loadedImg = new Image();

    // Create callback to execute once the image has finished loading.
    loadedImg.onload = function()
    {
        secondWheel.wheelImage = loadedImg;    // Make wheelImage equal the loaded image object.
        secondWheel.draw();                    // Also call draw function to render the wheel.
    }

    // Set the image source, once complete this will trigger the onLoad callback (above).
    loadedImg.src = "{{ asset('imgs/VongQuay2.png') }}";
    // In this example I use raw Javascript to do the AJAX, but if you have jQuery included
    // in your website so might want to use its AJAX features as its a bit less code to write.
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ajaxStateChange;

    // Function called on click of spin button.
    function calculatePrizeOnServer()
    {
        let segmentNumber = 0;

        // Make get request to the server-side script.
        xhr.open('GET',"http://127.0.0.1:8080/api/bias", true);
        xhr.send('');
    }

    // Called when state of the HTTP request changes.
    function ajaxStateChange()
    {
        if (xhr.readyState < 4) {
            return;
        }

        if (xhr.status !== 200) {
            return;
        }

        // The request has completed.
        if (xhr.readyState === 4) {
            let segmentNumber = xhr.responseText;   // The segment number should be in response.
            console.log(segmentNumber);
            if (segmentNumber) {
                let stopAt = secondWheel.getRandomForSegment(segmentNumber);

                // Important thing is to set the stopAngle of the animation before stating the spin.
                secondWheel.animation.stopAngle = stopAt;
                console.log(stopAt);
                // Start the spin animation here.
                secondWheel.startAnimation();
            }
        }
    }

    // Usual pointer drawing code.
    drawTriangle2();

    function drawTriangle2()
    {
        // Get the canvas context the wheel uses.
        let ctx2 = secondWheel.ctx;

        ctx2.strokeStyle = 'navy';     // Set line colour.
        ctx2.fillStyle   = 'aqua';     // Set fill colour.
        ctx2.lineWidth   = 2;
        ctx2.beginPath();              // Begin path.

        ctx2.stroke();                 // Complete the path by stroking (draw lines).
        ctx2.fill();                   // Then fill.
    }

    let audio = new Audio('{{ asset('tick.mp3') }}');  // Create audio object and load desired file.

    function playSound()
    {
        // Stop and rewind the sound (stops it if already playing).
        audio.pause();
        audio.currentTime = 0;

        // Play the sound.
        audio.play();
    }
    </script>

</body>
</html>
