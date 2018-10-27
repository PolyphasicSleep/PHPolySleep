<?php

class layout
{

    public static function header(){

        $activepage = $_SERVER["PHP_SELF"];
        $isAuth = false;
        if(isset($_SESSION["userAuth"])) {
            $isAuth = $_SESSION["userAuth"];
        }
        $headerstring =
            '<h1>Polyphasic Sleep</h1>
             <ul class = "navbartop">
                <li><a href="/phpolysleep/index.php">Home</a></li>
              <!--  <li><a href="/Statistics.html">Statistics</a></li> -->
                <li><a href="/phpolysleep/pages/patterns.php">Patterns</a></li>
               <!-- <li><a href="/EBook.html">E-Book</a></li> -->
                <li><a href="/pages/app.php">App</a></li>
                <li><a href="/phpolysleep/pages/contact.php">Contact</a></li>
                <li class="usermenu"><a href="/phpolysleep/pages/login.php">Login</a></li>
                <li class="usermenu"><a href="/phpolysleep/pages/user.php">NAMENAMENAME</a></li>
                <li class="navhamburgermenu">
                    <a class="more" onclick="displaymorenav()"><span>&#x2630</span></a>
                </li>
            </ul>';



        if($isAuth){
            $replaced = str_replace('<li class="usermenu"><a href="/phpolysleep/pages/login.php">Login</a></li>', "", $headerstring);
            $replaced = str_replace("NAMENAMENAME", $_SESSION["userName"], $replaced);
        } else {
            $replaced = str_replace("<li class=\"usermenu\"><a href=\"/phpolysleep/pages/user.php\">NAMENAMENAME</a></li>", "", $headerstring);
        }

        if(strpos($replaced, $activepage) !== false){
            $replaceable = 'href="'.$activepage;
            $replaced = str_replace($replaceable, 'class="active', $replaced);
        } else if(strpos($activepage, "/phpolysleep/pages/patterns/") !== false){
            $replaced = str_replace('href="/phpolysleep/pages/patterns.php"',
                'href="/phpolysleep/pages/patterns.php" class="activeclickable"', $replaced);
        }


        echo $replaced;
    }

    public static function footer(){
        $activepage = $_SERVER["PHP_SELF"];
        $footerstring =
            '<footer>
                <p>&copy Michael Rothammer 2018</p>
                <p><a href="/phpolysleep/pages/contact.php">Contact</a></p>
                <p>
                    <a href="/phpolysleep/pages/login.php#logIn" style="padding-right:2em">Log in</a>
                    <a href="/phpolysleep/pages/login.php" style="padding-left:2em">Sign up</a>
                </p>
            </footer>';

        if(isset($_SESSION["userAuth"])) {
            $loggedin = $_SESSION["userAuth"];
        } else {
            $loggedin = false;
        }
        if($loggedin){
            $replaced = str_replace('<a href="/phpolysleep/pages/login.php#logIn" style="padding-right:2em">Log in</a>
                    <a href="/phpolysleep/pages/login.php" style="padding-left:2em">Sign up</a>',
                '<a href="/phpolysleep/pages/logout.php">Log out</a>', $footerstring);
        } else {
            $replaced = $footerstring;
        }

        if(strpos($replaced, $activepage) !== false){
            $replaceable = 'href="'.$activepage.'"';
            $replaced = str_replace($replaceable, "", $replaced);
        }

        echo $replaced;
    }

    public static function patternMenu(){
        $activepage = $_SERVER["PHP_SELF"];
        $menustring = '
        <div class="col-3" style="padding: 0">
        <ul class="patternmenu">
            <li class="title">
                <a class="menutitle" href="/phpolysleep/pages/patterns.php"><h3>Sleep patterns</h3></a>
                <a class="collbutton" onclick="displaymenu(this, false)">Expand</a>
            </li>
            <li>
                <a href="/phpolysleep/pages/patterns/monophasic.php">Monophasic</a>
    
            </li>
            <li>
                <a href="/phpolysleep/pages/patterns/segmented.php">Segmented</a>
            </li>
            <li>
                <a href="/phpolysleep/pages/patterns/siesta.php">
                    Siesta<span class="desktoparr">&#x1F892</span>
                </a>
                <a class="phoneplus" onclick="displaysubmenu(this)">&#x25BC</a>
                <ul>
                    <li><a href="/phpolysleep/pages/patterns/siesta/longnap.php">Long nap</a></li>
                    <li><a href="/phpolysleep/pages/patterns/siesta/shortnap.php">Short nap</a></li>
                </ul>
            </li>
            <li>
                <a href="/phpolysleep/pages/patterns/triphasic.php">Triphasic</a>
            </li>
            <li>
                <a href="/phpolysleep/pages/patterns/dualcore.php">
                    Dual core
                    <span class="desktoparr">&#x1F892</span>
                </a>
                <a class="phoneplus" onclick="displaysubmenu(this)">&#x25BC</a>
                <ul>
                    <li><a href="/phpolysleep/pages/patterns/dualcore/dc1.php">Dual core 1</a></li>
                    <li><a href="/phpolysleep/pages/patterns/dualcore/dc2.php">Dual core 2</a></li>
                    <li><a href="/phpolysleep/pages/patterns/dualcore/dc3.php">Dual core 3</a></li>
                </ul>
            </li>
            <li>
                <a href="/phpolysleep/pages/patterns/everyman.php">
                    Everyman
                    <span class="desktoparr">&#x1F892</span>
                </a>
                <a class="phoneplus" onclick="displaysubmenu(this)">&#x25BC</a>
                <ul>
                    <li><a href="/phpolysleep/pages/patterns/everyman/e2.php">Everyman 2</a></li>
                    <li><a href="/phpolysleep/pages/patterns/everyman/e3.php">Everyman 3</a></li>
                    <li><a href="/phpolysleep/pages/patterns/everyman/e4.php">Everyman 4</a></li>
                </ul>
            </li>
            <li>
                <a href="/phpolysleep/pages/patterns/uberman.php">Uberman</a>
            </li>
        </ul>

        </div>
        ';

        if(strpos($menustring, $activepage) !== false){
            $replaceable = 'href="'.$activepage;
            $replaced = str_replace($replaceable, 'class="active', $menustring);
        } else {
            $replaced = $menustring;
        }

       echo $replaced;
    }

    public static function scheduleButton($schedule){
        include("dataScripts.php");
        $dataHandle = new dataScripts();

        if(!isset($_SESSION["userAuth"]) || $_SESSION["userAuth"] === false){
            return;
        }

        if(isset($_SESSION["schedule"])){
            $currsched = $_SESSION["schedule"];
        } else {
            $currsched = $dataHandle->getSchedule();
        }

        if(isset($currsched) && $currsched === $schedule){
            echo "<div class='scheduleBtnCon'><a id='selectSched' href='/phpolysleep/pages/user.php' onclick='editSchedule()'>Edit schedule</a></div>";
        } else {
            echo "<div class='scheduleBtnCon'><a id='selectSched' onclick='saveSchedule(\"".$schedule."\")'>Select this schedule</a></div>";
        }
    }
}