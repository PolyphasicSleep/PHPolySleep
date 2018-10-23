<?php

class layout
{

    public static function header(){

        $activepage = $_SERVER["PHP_SELF"];

        $headerstring =
            '<h1>Polyphasic Sleep</h1>
             <ul class = "navbartop">
                <li><a href="/pages/home.php">Home</a></li>
              <!--  <li><a href="/Statistics.html">Statistics</a></li> -->
                <li><a href="/pages/patterns.php">Patterns</a></li>
               <!-- <li><a href="/EBook.html">E-Book</a></li> -->
                <li><a href="/pages/app.php">App</a></li>
                <li><a href="/pages/contact.php">Contact</a></li>
                <li class="usermenu"><a href="/pages/login.php">Login</a></li>
                <li class="usermenu"><a href="/pages/testschritt2.php">NAMENAMENAME</a></li>
                <li class="navhamburgermenu">
                    <a class="more" onclick="displaymorenav()"><span>&#x2630</span></a>
                </li>
            </ul>';

        if(strpos($headerstring, $activepage) !== false){
            $replaceable = 'href="'.$activepage;
            $replaced = str_replace($replaceable, 'class="active', $headerstring);
        } else {
            $replaced = $headerstring;
        }

        if($_SESSION["userAuth"]){
            $replaced = str_replace('<li class="usermenu"><a href="/pages/login.php">Login</a></li>', "", $replaced);
            $replaced = str_replace("NAMENAMENAME", $_SESSION["userName"], $replaced);
        } else {
            $replaced = str_replace("<li class=\"usermenu\"><a href=\"/pages/testschritt2.php\">NAMENAMENAME</a></li>", "", $replaced);
        }


        echo $replaced;
    }

    public static function footer(){
        $activepage = $_SERVER["PHP_SELF"];
        $footerstring =
            '<footer>
                <p>&copy Michael Rothammer 2018</p>
                <p><a href="/pages/Contact.html">Contact</a></p>
            </footer>';

        if(strpos($footerstring, $activepage) !== false){
            $replaceable = 'href="'.$activepage.'"';
            $replaced = str_replace($replaceable, '', $footerstring);
        } else {
            $replaced = $footerstring;
        }
        echo $footerstring;
    }
}