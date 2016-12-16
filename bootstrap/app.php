<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
  'settings' => [
    'displayErrorDetails' => true,

  ]
]);

$container = $app->getContainer();

$contianer['view'] = function($container) {
  $view = new \Slim\View\Twing(__DIR__ . '/../resources/views', [
    'cache' => false,
  ]);

  $view->addExtension(new \Slim\Views\TwingExtension(

    $container->router,
    $container->request->getUri()
  ));

  return $view;
};

require __DIR__ . '/../src/routes.php';
