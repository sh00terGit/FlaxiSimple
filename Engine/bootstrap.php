<?php

require_once __DIR__.'/../vendor/autoload.php';
use Engine\Cms;
use Engine\DI\DependentsInjection;

try {
    $containter = new DependentsInjection();
    $services = require __DIR__ . '/Config/Services.php';
    foreach ($services as $service) {
        $provider = new $service($containter);
        $provider->init();
    }
    
    $cms = new Cms($containter);
    $cms->run();
} catch (\ErrorException $exc) {
    echo $exc->getMessage();
}
