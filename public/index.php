<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require '../vendor/autoload.php';

session_start();

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

require '../src/route.php';


require '../config/config.php';

$app->run();