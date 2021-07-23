<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class TimezoneController extends Controller
{
    public function listTimezone()
    {
        // list of GMT
        $gmt = timezone_identifiers_list(2047);

        // convert to object 
        $object_gmt = [];
        foreach ($gmt as $key => $item_tz) {
            // current timezone
            $dtz = new DateTimeZone($item_tz);
            // time in current timezone
            $time_in_currentTZ = new DateTime('now', $dtz);
            $offset = $dtz->getOffset($time_in_currentTZ) / 3600;
            $get_gmt = "GMT" . ($offset < 0 ? $offset : "+" . $offset);
            // object
            $gmt[$key] = array_push($object_gmt, (object)[
                'timezone' => $item_tz,
                'GMT' => $get_gmt,
            ]);
        }

        return $object_gmt;
    }
}
