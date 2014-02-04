<?php
use Zippo\FileReader;

require_once __DIR__.'/../vendor/autoload.php';


$app = new Silex\Application();
// definitions
$app['debug'] = true;

$app->get('/', function () use ($app) {
    $fileReader = new FileReader();    
    return "hej";
});
$app->run();
