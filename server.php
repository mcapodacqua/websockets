<?php
/**
 * To run this server:
 * ```bash
 * php -S localhost:8000 server.php
 * ```
 * To trigger an event:
 * ```bash
 * curl -X POST localhost:8000 -d message=foo
 * ```
 */
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $app_id = getenv('APP_ID');
    $app_key = getenv('APP_KEY');
    $app_secret = getenv('APP_SECRET');

    $message = isset($_POST['message']) ? $_POST['message'] : null;
    $pusher = new Pusher($app_key, $app_secret, $app_id);
    $pusher->trigger('test_channel','test_event',array(
        'time' => time(),
        'message' => $message,
    ));
    http_response_code(200);
    echo json_encode(array(
        'error' => false,
        'message' => 'Event triggered',
    ));
    exit();
} else {
    http_response_code(405);
    echo json_encode(array(
        'error' => true,
        'message' => 'Method not allowed'
    ));
    exit(1);
}