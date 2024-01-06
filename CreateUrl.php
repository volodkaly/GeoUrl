<?php

namespace Vendor\PackageName;

require_once __DIR__ . '/vendor/autoload.php';


$waypoints = ['50.058609,14.3298749','51.058609,14.1298749','50.058609,13.3298749','50.068609,14.2298749'];
function createUrl(array $waypoints){


$url = 'https://www.google.com/maps/dir/'.join('/',$waypoints);

print_r($url);
return $url;
}

createUrl($waypoints);
