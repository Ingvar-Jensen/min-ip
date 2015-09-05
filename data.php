<?php

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() {

    global $user_agent;
    global $os;

    $os_platform    =   "Vi klarer ikke å finne ditt operativsystem"; //could be a default message

    $os_array       =   array(
        '/windows nt 10/i'     =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;

            //show pretty icons
            switch($os_platform){
                case 'Windows 7':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/windows.png'> ".$os_platform."</p>";
                    break;
                case 'Windows 10':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/windows.png'> ".$os_platform."</p>";
                    break;
                case 'Windows 8':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/windows.png'> ".$os_platform."</p>";
                    break;
                case 'Linux':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/linux.png'> ".$os_platform."</p>";
                    break;
                case 'Ubuntu':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/linux.png'> ".$os_platform."</p>";
                    break;
                case 'Iphone':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/apple.png'> ".$os_platform."</p>";
                    break;
                case 'iPod':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/apple.png'> ".$os_platform."</p>";
                    break;
                case 'Mac OS X':
                echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/apple.png'> ".$os_platform."</p>";
                break;
                case 'Android':
                    echo  "<p><strong>". $os ." </strong></p><p class='oswald'><img  src='img/android.png'> ".$os_platform."</p>";
                    break;
                default:
                    echo "";
            }
        }

    }

    return $os_platform;

}

function getBrowser() {

    global $user_agent;
    global $browserTitle;

    $browser        =   "Vi klarer ikke å se din nettleser";

    $browser_array  =   array(
        '/msie/i'       =>  'Internet Explorer',
        '/firefox/i'    =>  'Firefox',
        '/safari/i'     =>  'Safari',
        '/chrome/i'     =>  'Chrome',
        '/opera/i'      =>  'Opera',
        '/netscape/i'   =>  'Netscape',
        '/maxthon/i'    =>  'Maxthon',
        '/konqueror/i'  =>  'Konqueror',
        '/mobile/i'     =>  'Handheld Browser'
    );

    foreach ($browser_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;

            //show pretty icons
            switch($browser){
                case 'Firefox':
                    echo  "<p><strong>". $browserTitle ." </strong></p><p class='oswald'><img  src='img/ff.png'> ".$browser."</p>";
                    break;
                case 'Chrome':
                    echo  "<p><strong>". $browserTitle ." </strong></p><p class='oswald'><img  src='img/chrome.png'> ".$browser."</p>";
                    break;
                case 'Opera':
                    echo  "<p><strong>". $browserTitle ." </strong></p><p class='oswald'><img  src='img/opera.png'> ".$browser."</p>";
                    break;
                case 'Internet Explorer':
                    echo  "<p><strong>". $browserTitle ." </strong></p><p class='oswald'><img  src='img/ie.png'> ".$browser."</p>";
                    break;
                default:
                    echo "";
            }
        }

    }

    return $browser;
}

function getISP(){
    $getHost = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    echo "<p class='oswald'>".$getHost."</p>";
}

?>
