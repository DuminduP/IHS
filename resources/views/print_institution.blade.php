<html>
<head>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
                margin: 0;
                -webkit-print-color-adjust: exact; 
            }
            .print-btn  {
                display: none!important;
            }
        }
        .content    {
            margin: auto; 
            width: 210mm; 
            height: 280mm;
            text-align: center;
        }

        .box {
            --b: 6px;
            /* thickness of the border */
            --c: lightskyblue;
            /* color of the border */
            --w: 60px;
            /* width of border */


            border: var(--b) solid transparent;
            /* space for the border */
            background:
                linear-gradient(var(--c), var(--c)) top left,
                linear-gradient(var(--c), var(--c)) top left,
                linear-gradient(var(--c), var(--c)) bottom left,
                linear-gradient(var(--c), var(--c)) bottom left,
                linear-gradient(var(--c), var(--c)) top right,
                linear-gradient(var(--c), var(--c)) top right,
                linear-gradient(var(--c), var(--c)) bottom right,
                linear-gradient(var(--c), var(--c)) bottom right;
            background-size: var(--b) var(--w), var(--w) var(--b);
            background-origin: border-box;
            background-repeat: no-repeat;
            width: 240px;
            padding-top: 0px;
            padding-bottom: 10px;
            margin: auto;
        }
        .ins    {
            text-align: left;
            width: 190mm;
            border: 4px solid lightskyblue;
            border-radius: 6px;
            padding: 10px;
            margin: auto;
        }
        h1, h2, h3, h4, h5, h6  {
            margin-top: 5px;
        }
        .print-btn  {
            cursor: pointer;
            padding: 5px;
            display: flex;
            vertical-align: top;
            float: right;
        }
        .logo   {
            background-color: lightskyblue; 
            padding: 10px;
        }

    </style>
</head>
<body style="text-align: center;">
    <div class="content">
        <div class="logo">
            <button class="print-btn" onclick="window.print();">Print</button>
            <img src="/images/logo.png" alt="Logo" style="margin: auto">
            <h1 style="margin-bottom: 0px">GIHS - 1717</h1>
        </div>
        <div style="padding-top: 10px">
            <h2>Welcome to Grievance Information Handling System</h2>
            <h3>Ministry of Public Services, Sri Lanka</h3>
            <p>Now, you can lodge a grievance by scanning below QR Code.</p>
        </div>
        <div class="box">
            <div class="qr-div">
                <h4>SCAN HERE</h4>
                {{ QrCode::size(200)->generate(env('QR_HOST').'/report/?id='.$institution->id) }}
            </div>
        </div>
        <h3 style="margin-bottom: 0px">{{ $institution->name }}</h3>
        <div class="ins" style="margin-top:20px">
            <div style="background-color: lightcyan; padding: 5px;">
            <h4>Instructions:</h4>
            <ul>
                <li>
                    Download a QR code reader from your app store.
                </li>
                <li>
                    Launch the application and allow it to access your camera.
                </li>
                <li>
                    Hold your device over the QR code so that is clearly visible within your device screen.
                </li>
                <li>
                    Scan the QR Code and go to the Grievance Lodging site.
                </li>
            </ul>
            </div>
        </div>
        <p>We’re helping improve the quality of our government sector through your support.</p>
    </div>
</body>
</html>
