<?php

require_once __DIR__.'/../vendor/autoload.php';
use Engine\Cms;
use Engine\DI\DependentsInjection;

try {
    $container = new DependentsInjection();
    $services = require __DIR__ . '/Config/Services.php';
    foreach ($services as $service) {
        $provider = new $service($container);
        $provider->init();
    }
    
    $cms = new Cms($container);
    $cms->run();
} catch (\ErrorException $exc) {
    echo $exc->getMessage();
}
