<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>min-ip.no</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Finn din IP adresse her">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css" />
    
    <!-- google analytics -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67155336-1', 'auto');
  ga('send', 'pageview');
</script>

<!-- google map-->
<script src="http://maps.googleapis.com/maps/api/js"></script>
</head>
<body>
    
<?php include('data.php') ?><!-- load data -->
<div class="container"> <!-- start main container -->

    <!-- set strings -->

    <?php 
    $title = "What is my IP?";
    $subTitle = "En tjeneste fra";
    $branding = "Unofix.no";

    ?>


    <div class="col-md-8 col-xs-10 col-md-offset-2 text-center  text-uppercase shadow-font">
        <h1 class="wow rubberband"><?php echo $title?></h1><p class="syncopate"><?php echo $subTitle?><a href="http://unofix.no" title"Kom over for kule websider"><?php echo "Unofix.no"?></a></p>
        <hr class="big">
    </div>

    <!-- Get the IP adress-->

    <div class="col-md-8 col-xs-10 col-md-offset-2 text-center ip text-uppercase shadow-font">

        <!-- top row -->

        <div class="row ip big wow fadeIn">
            <?php $ip = "<p><strong>Din ip adresse </strong></p><p class='oswald'>" . $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']). "</p>";
            echo $ip;
            echo "<hr class='big'>";
            echo "<p class='smaller'>Din enhet gir fra seg disse opplysningene: </p>";
            ?>
         </div>
    </div>
    
        <!-- left row -->
    <div class="col-md-4 col-xs-10 col-md-offset-2 text-center bigger text-uppercase shadow-font">
    <div class="spacer"></div>
        <div class="row shadow-font wow fadeIn " data-wow-delay="0.3s">
            <?php
            getOS();
            //echo "<hr>";
            ?>
        </div>

        <!-- new left row -->

        <div class="row wow fadeIn shadow-font" data-wow-delay="0.5s">
            <?php
            getBrowser();

            ?>
        </div>

        <!-- new left row -->

        <div class="row wow fadeIn shadow-font" data-wow-delay="0.7s">

            <?php
            //echo "<hr>";
            echo "<p>leverandør</p>";
            getISP();
            $location = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
            $details = json_decode(file_get_contents("http://ipinfo.io/".$location."/json"));
     
            echo "<p class='oswald'>".$details->org."</p>";//get ISP
            $geoLocation = $details->loc;//get location
            $geoRegion = $details->region;//get location
            echo $geoRegion;
            //getCountry()
            ?>
        
        </div>
    </div><!-- end left container -->
    
    <!-- start right container -->

    <div class="col-md-6 col-xs-10 text-center ip text-uppercase shadow-font">
    <div class="spacer"></div>
        
        <!-- load the map -->
    <div class="row shadow-font wow fadeIn " data-wow-delay="0.9s">
        <?php 
        echo "
        <script>
        function initialize() {
        var mapProp = {
        center:new google.maps.LatLng(".$geoLocation."),
        zoom:8,
        mapTypeId:google.maps.MapTypeId.ROADMAP //ROADMAP, HYBRID, SATELLITE, TERRAIN
        };
        var map=new google.maps.Map(document.getElementById('googleMap'),mapProp);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        ";
?>        
        <!--<div id="googleMap" style="width:500px;height:380px;"></div>-->
    </div>
        <div class="col-md-8 col-xs-12 col-md-offset-2 map text-center">
            <p>Din lokasjon</p>
        <div id="googleMap" class="map"></div>
        </div>
    
      
    <!-- GEO IP CLASS
{
    "ip": "90.149.159.123",
    "hostname": "123.90-149-159.nextgentel.com",
    "city": null,
    "country": "NO",
    "loc": "59.9500,10.7500",
    "org": "AS15659 NextGenTel AS"
}

    -->
    
</div>
</div>

<script src="js/wow.js"></script>
<script>
    new WOW().init();
</script>
<div class="container">
<div class="col-md-12">




</div>
</div>
</body>
</html>

