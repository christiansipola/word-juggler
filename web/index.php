<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
#ini_set('log_errors','1');
ini_set('error_log', __DIR__ . '/error.log');
use Zippo\FileReader;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
// definitions
$app['debug'] = true;

$fileReader = new FileReader();
$app->get('/', function () use ($app, $fileReader) {
    $fileReader->echoListOfRandomWords(20);
    return "\n end \n";
});
$app->run();
