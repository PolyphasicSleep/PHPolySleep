<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 10/19/2018
 * Time: 17:15
 */

class layout
{

    public static function header(){

        $activepage = $_SERVER["PHP_SELF"];

        $headerstring =
            '<h1>Polyphasic Sleep</h1>
             <ul class = "navbartop">
                <li><a href="/phpolysleep/home.php">Home</a></li>
              <!--  <li><a href="/Statistics.html">Statistics</a></li> -->
                <li><a href="/phpolysleep/patterns.php">Patterns</a></li>
               <!-- <li><a href="/EBook.html">E-Book</a></li> -->
                <li><a href="/phpolysleep/app.php">App</a></li>
                <li><a href="/phpolysleep/contact.php">Contact</a></li>
                <li><a href="/phpolysleep/index.php">Login</a></li>
                <li><a href="/phpolysleep/testschritt2.php">NAMENAMENAME</a></li>
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
            $replaced = str_replace("Login", "Logout", $replaced);
            $replaced = str_replace("NAMENAMENAME", $_SESSION["userName"], $replaced);
        } else {
            $replaced = str_replace("<li><a href=\"/phpolysleep/testschritt2.php\">NAMENAMENAME</a></li>", "", $replaced);
        }


        echo $replaced;
    }

    public static function footer(){
        $activepage = $_SERVER["PHP_SELF"];
        $footerstring =
            '<footer>
                <p>&copy Michael Rothammer 2018</p>
                <p><a href="/phpolysleep/Contact.html">Contact</a></p>
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