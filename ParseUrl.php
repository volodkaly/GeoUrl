<?php

namespace Vendor\PackageName;

require_once __DIR__ . '/vendor/autoload.php';


$url = 'https://www.google.com/maps/dir/50.0513348,14.2443017/49.96652,14.1481743/@50.0101374,14.1306649,12z/data=!3m1!4b1!4m2!4m1!3e0?entry=ttu';

function parseUrl(string $url)
{

    try {

        /*
        Converting string to array using / sign as a delimiter.
         */

        $array = explode('/', $url);

        /*
        Walking through the array to detect parts with more than 1 coma.
        This is important to cut off the last piece usually containing zoom option and not separated with /
        For example: ....65/50.2861274,13.7285562/@50.1261599,13.7560221,9z/data=!4m2!4m1!3e0?entry=ttu
        In this example 9z needs to be removed
         */
        foreach ($array as $key => &$val) {
            if (preg_match_all('/\,/', $array[$key]) > 1) {
                $array[$key] = explode(',', $array[$key]);
                $array[$key] = $array[$key][0] . ',' . $array[$key][1];
            }
        }

        /*
        For the future coordinates validation and processing only numeric coordinates should be kept,
        meaning all the other parts which do not contain numbers, comas or too long may be just removed.
         */
        foreach ($array as $key => &$val) {
            if (preg_match_all('/[0-9]/', $array[$key]) == 0 or preg_match_all('/@/', $array[$key]) == 1 or preg_match_all('/,/', $array[$key]) == 0 or mb_strlen($array[$key]) > 30) {
                unset($array[$key]);
            }
        }

        /*
        Checking if smth else besides numbers, comas, dots, minus is present.
        This part should catch the coordinates containing typos and errors.
        Is there are too many errors than the part wont pass the check in the previous step,
        because it would be too long, more than 30 chars.
         */
        foreach ($array as $key => &$val) {
            if (preg_match_all('/[^0-9\.\,-]/', $array[$key]) > 0) {
                echo 'invalid point was deleted from the route:' . $array[$key] . PHP_EOL . PHP_EOL;
                unset($array[$key]);
            }
        }

        /*
        Placing the pairs latitude - longitude into individual arrays within the main array.
         */
        foreach ($array as $key => &$val) {
            $array[$key] = explode(',', $array[$key]);
        }

        /*
        Checking the coordinates to be inside the ranges for latitudes (-90 to 90) and longitudes (-180 to 180).
        If they dont pass the info message is displayed.
         */
        foreach ($array as $key => &$val) {

            foreach ($array[$key] as $key2 => &$val2) {
                $i = 0;
                if ((integer) $array[$key][0] < -90 or (integer) $array[$key][0] > 90 or (integer) $array[$key][1] < -180 or (integer) $array[$key][1] > 180) {
                    $i = $i + 1;
                    echo 'route coordinates out of ranges were removed:' . join(',', $val) . PHP_EOL . PHP_EOL;
                    unset($array[$key]);
                    if ($i > 0) {
                        break;
                    }
                }

            }
        }

        $waypoints = array_values($array);
        $waypointsJson = json_encode($waypoints);
        print_r($waypointsJson);
        if (empty($waypoints)) {
            throw new Exception("No coordinates found in the URL.");
        }
        return ($waypoints);

    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

}

parseUrl($url);
