<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Hva er min IP adresse?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Finn din IP adresse og annen info om din enhet">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css" />
        
    <!-- start: Facebook Open Graph -->
    <meta property="og:title" content="Hvor sikker er du på nett?"/>
    <meta property="og:description" content="Se hvilken informasjon du viser på internett"/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content="http://www.min-ip.no"/>
    <meta property="og:image" content="img/privacy.jpg"/>
    <!-- end: Facebook Open Graph -->
    
    <!-- get google map-->
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <!-- get adsense nonsense -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- google analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-67155336-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>

<!-- Facebook likes -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/nb_NO/sdk.js#xfbml=1&version=v2.4&appId=263203523779915";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
    
<?php include('data.php') //load some php script ?>

<?php // check visitors country
     $continent = geoip_country_name_by_name($_SERVER['REMOTE_ADDR']);
          
  //switch languages     
    if($continent == "Norway"){
        $title = "Hva er min ip?";
        $subTitle = "En tjeneste fra ";
        $branding = "Unofix.no";  
        $yourIp = "Din ip adresse";
        $yourUnit = "Din enhet gir fra seg disse opplysningene";
        $os = "operativsystem";
        $browserTitle = "nettleser";
        $isp = "leverandør";
        $userLocation = "din lokasjon";
        $comment = "Legg igjen en kommentar";
        $infoDevice = "Info om enhet";
        $userAgent = "Nettleserens user agent";   

        }else if($continent == "Colombia" || $continent == "Colombia" || $continent == "Ecuador" || $continent == "Mexico"
        || $continent == "Peru" || $continent == "Argentina" || $continent == "Chile" || $continent == "El Salvador" ||
        $continent == "Panama"){
        $title = "¿Cual es mi IP?";
        $subTitle = "Un servicio de ";
        $branding = "Unofix.no";   
        $yourIp = "Tu dirección IP";
        $yourUnit = "Información de tu dispositivo";
        $os = "Sistema operativo";
        $browserTitle = "Navegador";
        $isp = "Proveedor de servicio de Internet";
        $userLocation = "Tu ubicación";
        $infoDevice = "Información del dispositivo";
        $userAgent = "Navegador";

        }else{
        $title = "What is my IP?";
        $subTitle = "A service from ";
        $branding = "Unofix.no";   
        $yourIp = "Your ip adress";
        $yourUnit = "Your device is giving me this information";
        $os = "operating system";
        $browserTitle = "browser";
        $isp = "Internet Service Provider";
        $userLocation = "your location";
        $comment = "Leave a comment";
        $infoDevice = "device info";
        $userAgent = "Browsers user agent";
     }?>

    <div class="container"> <!-- start main container -->
     <!-- start top section -->   
    <div class="col-md-12 col-xs-12  text-center text-uppercase shadow-font">
        <h1 class="wow rubberband"><?php echo $title?></h1><p class="syncopate"><?php echo $subTitle?><a href="http://unofix.no" title="Kom over for kule websider"><?php echo "Unofix.no"?></a></p>
        <hr class="big">
    </div>
    
      
    <div class="col-md-12 col-xs-12 text-center ip text-uppercase shadow-font">
    <section>
    <div class="row ip big ">
        <?php

        if(($continent == "Norway")?$continent = "Norge" : $continent);// Switching Norway to Norge

        $ip =   $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
            echo "<p class='small'><strong>".$yourIp."</strong></p><p class='oswald' >" .$ip. "</p>";
            echo "<p class='smaller'>";
            echo $continent;
            echo "</p>";
            echo "<hr class='big'>";
            echo "<p class='smaller'>".$yourUnit."</p>";
            ?>
    </div>
    </section>
    </div>
    
    <!-- start left row, get device info -->     
    <!-- show the OS -->    
    <div class="col-md-6 col-xs-12  text-center bigger text-uppercase shadow-font">
    <div class="spacer"></div>
    <p class="bigger"><?php echo $infoDevice ?></p>
        <div class="row shadow-font wow fadeIn " data-wow-delay="0.3s">
            <?php
            getOS();
            ?>
        </div>
    
        <!-- show the Browser -->    
        <div class="row wow fadeIn shadow-font" data-wow-delay="0.5s">
            <?php
            getBrowser();
            ?>
        </div>

        <!-- show the ISP -->    
        <div class="row wow fadeIn shadow-font" data-wow-delay="0.7s">

            <?php
            echo "<p>" . $isp . "</p>";
            getISP();
            $location = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
            $details = json_decode(file_get_contents("http://ipinfo.io/".$location."/json")); //get visitors location in JSON format
                /* ***************************************************
                This is your json options:
                 GEO IP CLASS
                    {
                        "ip": "8.8.8.8",
                        "hostname": "your isp",
                        "city": 'some city',
                        "country": "NO",
                        "loc": "32.9500,54.7500",
                        "org": "ISP NAME AS"
                    }
                ****************************************************** */    
            echo "<p class='oswald'>".$details->org."</p>";//get ISP
            $geoLocation = $details->loc;//get location
            $geoRegion = $details->region;//get location
            echo "<p class='oswald'><strong>".$geoRegion. "</strong></p>";
            echo "<p>". $userAgent. "</p>";
            echo "<p class='oswald'><strong>". $user_agent . "</strong></p>";//show visitors user agent
            ?>

        </div><!-- end ISP -->

        <!-- start adsense-->
        <div class="row">
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-0951956569611644"
                 data-ad-slot="5395999526"
                 data-ad-format="auto">
            </ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

    </div><!-- end left container -->

    <!-- start right container -->
    <div class="col-md-6 col-xs-12 text-center ip text-uppercase shadow-font">
    <div class="spacer"></div>
        
        <!-- load the map -->
    <div class="row shadow-font">
        <?php 
        if(!is_null($geoLocation)){
        echo "
        <script>
        function initialize() {
        var mapProp = {
        center:new google.maps.LatLng(".$geoLocation."),
        zoom:7,
        mapTypeId:google.maps.MapTypeId.ROADMAP //ROADMAP, HYBRID, SATELLITE, TERRAIN
        };
        var map=new google.maps.Map(document.getElementById('googleMap'),mapProp);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        ";}
        ?>

    </div>
        <div class="col-md-8 col-xs-12 col-md-offset-2 text-center">
            <p class=""><?php echo $userLocation ?></p>
        <div id="googleMap" class="map  wow pulse " data-wow-delay="4s" data-wow-iteration="3"></div>
        <div class="fb-like wow tada" data-wow-delay="8s" data-wow-iteration="2" data-href="http://www.min-ip.no" data-width="50" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
    </div><!-- end right container -->


</div><!-- end main container -->
<div class="spacer"></div>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/wow.js"></script>
<script>
    new WOW().init();
</script>






</body>
</html>

