<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$app_id = getenv('APP_ID');
$app_key = getenv('APP_KEY');
$app_secret = getenv('APP_SECRET');

$pusher = new Pusher($app_key, $app_secret, $app_id);


$pusher->trigger('test_channel','test_event',array(
    'time' => time(),
    'message' => 'Hi!',
));