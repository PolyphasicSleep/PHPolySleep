<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 10/19/2018
 * Time: 17:15
 */

class testclass
{

    public static function header(){

        $activepage = $_SERVER["PHP_SELF"];

        $headerstring =
            '<ul class = "navbartop">
                <li><a href="/phpolysleep/index.html">Home</a></li>
                <li><a href="/Statistics.html">Statistics</a></li>
                <li><a href="/Patterns.html">Patterns</a></li>
                <li><a href="/EBook.html">E-Book</a></li>
                <li><a href="/App.html">App</a></li>
                <li><a href="/Contact.html">Contact</a></li>
                <li><a href="/phpolysleep/testschritt2.php">BOB</a></li>
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