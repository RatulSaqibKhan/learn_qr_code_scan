<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    body, input {font-size:14pt}
    input, label {vertical-align:middle}
    .qrcode-text {padding-right:1.7em; margin-right:0}
    .qrcode-text-btn {display:inline-block; background:url(http://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat; height:1em; width:1.7em; margin-left:-1.7em; cursor:pointer}
    .qrcode-text-btn > input[type=file] {position:absolute; overflow:hidden; width:1px; height:1px; opacity:0}
</style>

<script type="text/javascript" src="{{asset('js/qr_packed.js')}}"></script>
</head>
<body>
    <!-- Code is used form : 
        1. https://codepen.io/SitePoint/pen/WEbVzd?__cf_chl_jschl_tk__=243739f37399d4595c61dc2642540be651f26569-1577095895-0-ARK5Eol35uMRJbD-wqednEjTK9s0Dq57dJa5l5eukb0toIY-YFMSmtrlj0NSzshZaH4v7TxbDnEh12B2CcQc6f845SjVkoTulJK17YtdZ8PAMynPWqkbzLEZYc28fY1rmyyq0DQ4ezO5LyTGTntMw82iaD_zBrmouHUEPrX7CT9RmXjeh1zuvsAanqX3VfQUWvDkADG-Gy5zDcafVLsG5DTSmJdIfqQ6mNq42F5kR0QDj1wa-DpGIz7nin29EGTGHgEFx4Nd_AItFeHDpVvVghsg2y53I0SIrnHqnM50J2sXmhALWQhVoK3GewlNM43Jg8VemvrjRazcBPvqbuPYKdUJlcpUC4nExX_ShFzMPjYG 
        2. https://github.com/sitepoint-editors/jsqrcode
    -->
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <input type=text size=16 placeholder="Tracking Code" class=qrcode-text>
                    <label class=qrcode-text-btn>
                        <input type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex=-1>
                    </label> 
                    <input type=button value="Go" disabled>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        function openQRCamera(node) {
            var reader = new FileReader();
            reader.onload = function() {
                node.value = "";
                qrcode.callback = function(res) {
                    if(res instanceof Error) {
                        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
                    } else {
                        node.parentNode.previousElementSibling.value = res;
                    }
                };
                qrcode.decode(reader.result);
            };
            reader.readAsDataURL(node.files[0]);
        }

        function showQRIntro() {
            return confirm("Use your camera to take a picture of a QR code.");
        }
    </script>
</body>
</html>
