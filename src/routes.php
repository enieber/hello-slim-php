<?php
// Routes

use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/test/api', function ($request, $response, $args) {
    $data = array('name' => 'Bob', 'age' => 40);
    $tt =  $response->withJson($data);
    return $tt;
});

$app->get('/send/[{notification}]', function ($request, $response, $args) {

$config = new Config();
$config->setApplicationId('4fd1a2da-a0b6-4d85-99db-29a709e64964');
$config->setApplicationAuthKey('Y2ZmZmI3YmUtOTg4MS00MjhmLWE0ZjgtZjdlMGMxNTE2OGNh');
$config->setUserAuthKey('YWQzZTVlOGYtODljMi00MjM5LWI4MGUtNGU1NzM3MDVlYTJj');

$api = new OneSignal($config);

$notifications = $api->notifications->getAll();
//$notification = $api->notifications->getOne('notification_id');
// Do not combine targeting parameters
/*$api->notifications->add([
    'contents' => [
        'en' => 'Notification message'
    ],
    'included_segments' => ['All'],
    'data' => ['foo' => 'bar'],
    'isChrome' => true,
    'send_after' => new \DateTime('1 hour'),
    'filters' => [
        [
            'field' => 'tag',
            'key' => 'is_vip',
            'relation' => '!=',
            'value' => 'true',
        ],
        [
            'operator' => 'OR',
        ],
        [
            'field' => 'tag',
            'key' => 'is_admin',
            'relation' => '=',
            'value' => 'true',
        ],
    ],
    // ..other options
]);
*/
//$api->notifications->open('notification_id');
//$api->notifications->cancel('notification_id');

    $data = array('name' => 'notification', "notification" => $args);
    $tt = $response->withJson($data);
    return $tt;
});
