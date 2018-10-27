<?php

class timeScripts
{
    private $timeZoneOffset;

    function __construct(){
        $this->timeZoneOffset = -date("Z");
    }

    public function getDefaultTimes($schedule){
        $offset = $this->timeZoneOffset;

        switch($schedule){
            default:
            case "Monophasic Sleep":
                $starttimes = array(84600);
                $endtimes = array(27000);
                $types = array("core");
                break;
            case "Segmented Sleep":
                $starttimes = array(79200, 12600);
                $endtimes = array(5400, 25200);
                $types = array("core", "core");
                break;
            case "Triphasic Sleep":
                $starttimes = array(81000, 18000, 45000);
                $endtimes = array(0, 23400, 50400);
                $types = array("core", "core", "core");
                break;
            case "Siesta sleep (long nap)":
                $starttimes = array(0, 43200);
                $endtimes = array(18000, 48600);
                $types = array("core", "core");
                break;
            case "Siesta sleep (short nap)":
                $starttimes = array(0, 46800);
                $endtimes = array(21600, 48000);
                $types = array("core", "nap");
                break;
            case "Dual core (1 nap)":
                $starttimes = array(77400, 21600, 52200);
                $endtimes = array(3600, 27000, 53400);
                $types = array("core", "core", "nap");
                break;
            case "Dual core (2 naps)":
                $starttimes = array(81000, 21600, 41400, 55800);
                $endtimes = array(3600, 27000, 42600, 57000);
                $types = array("core", "core","nap" , "nap");
                break;
            case "Dual core (3 naps)":
                $starttimes = array(82800, 18000, 34200, 48600, 63000);
                $endtimes = array(1800, 23400, 35400, 49800, 64200);
                $types = array("core", "core", "nap", "nap", "nap");
                break;
            case "Everyman sleep (2 naps)":
                $starttimes = array(75600, 23400, 48600);
                $endtimes = array(7200, 24600, 49800);
                $types = array("core", "nap", "nap");
                break;
            case "Everyman sleep (3 naps)":
                $starttimes = array(82800, 21600, 36000, 50400);
                $endtimes = array(9000, 22800, 37200, 51600);
                $types = array("core", "nap", "nap", "nap");
                break;
            case "Everyman sleep (4 naps)":
                $starttimes = array(81000, 10800, 23400, 37800, 52200);
                $endtimes = array(1800, 12000, 24600, 39000, 53400);
                $types = array("core", "nap", "nap", "nap", "nap");
                break;
            case "Uberman":
                $starttimes = array(7200, 21600, 36000, 50400, 64800, 79200);
                $endtimes = array(8500, 22800, 37200, 51600, 66000, 80400);
                $types = array("nap", "nap", "nap", "nap", "nap", "nap");
                break;
        }

        $count = count($starttimes);

        for($i = 0; $i < $count; $i++){
            $starttimes[$i] += $offset;
            if($starttimes[$i]>86400){
                $starttimes[$i] -= 86400;
            } else if($starttimes[$i]<0){
                $starttimes[$i] += 86400;
            }

            $endtimes[$i] += $offset;
            if($endtimes[$i]>86400){
                $endtimes[$i] -= 86400;
            } else if($endtimes[$i]<0){
                $endtimes[$i] += 86400;
            }
        }

        return array($starttimes, $endtimes, $types);
    }

    public function respectTimeZoneSecs($seconds){
        $seconds += date("Z");
        if($seconds>86400){
            $seconds -= 86400;
        } else if($seconds<0){
            $seconds += 86400;
        }
        return $seconds;
    }

    public function formatHHmm($seconds){
        $seconds = $this->respectTimeZoneSecs($seconds);
        $datetime = new DateTime("@".$seconds);
        return $datetime->format("H:i");
    }

    public function formatHH ($seconds){
        $seconds = $this->respectTimeZoneSecs($seconds);
        $datetime = new DateTime("@".$seconds);
        return $datetime->format("H");
    }

    public function formatmm($seconds){
        $seconds = $this->respectTimeZoneSecs($seconds);
        $datetime = new DateTime("@".$seconds);
        return $datetime->format("i");
    }

    public function parseHHmm($hours, $minutes){
        $secs = $hours*3600 + $minutes*60;
        $secs += $this->timeZoneOffset;
        if($secs > 86400){
            $secs -= 86400;
        } else if ($secs < 0){
            $secs += 86400;
        }

        return $secs;
    }
}