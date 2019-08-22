<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>HTML5 Canvas Winning Wheel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" />
        <script type="text/javascript" src="{{ asset('js/Winwheel.min.js') }}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <style>
        #canvasContainer {
            position: relative;
            width: 300px;
        }
        
        #canvas {
            z-index: 1;
        }
        
        #prizePointer {
            position: absolute;
            left: 230px;
            top: 10px;
            z-index: 999;
        }
        </style>
    </head>
    <body>
        <div id="canvasContainer">
            <canvas id="secondCanvas" width="512" height="512">
                Canvas not supported, please user another browser.
            </canvas>
            <img id="prizePointer" src="http://dougtesting.net/elements/images/tutorials/basic_pointer.png" alt="V" />
            <button id='bigButton2' class='bigButton' onClick="calculatePrizeOnServer(); this.disabled=true;">QUAY SỐ</button>
            &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onClick="secondWheel.stopAnimation(false); secondWheel.rotationAngle=0; secondWheel.draw(); drawTriangle2(); bigButton2.disabled=false;">Thử lại</a>
        </div>
      
        <script>
            // Create new wheel object specifying the parameters at creation time.
            let secondWheel = new Winwheel({
            'drawMode'        : 'image',
            'drawText'        : true,  
            'numSegments' : 8,
            'outerRadius' : 250,
            'canvasId'    : 'secondCanvas',
            
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
        loadedImg.src = "{{ asset('imgs/cxcccx.png') }}";
        // In this example I use raw Javascript to do the AJAX, but if you have jQuery included
        // in your website so might want to use its AJAX features as its a bit less code to write.
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = ajaxStateChange;

        // Function called on click of spin button.
        function calculatePrizeOnServer()
        {
            let segmentNumber = 0;

            // Make get request to the server-side script.
            xhr.open('GET',"http://127.0.0.1:8000/api/bias", true);
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
