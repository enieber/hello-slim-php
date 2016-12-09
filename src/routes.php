<?php
// Routes

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
//    return $this->renderer->render($response, 'index.phtml', $args);
});
