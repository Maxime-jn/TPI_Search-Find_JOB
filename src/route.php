<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use maxime\sfo\controller\homeCTRL;


$app->get('/', [homeCTRL::class, 'showAccueil']);


$app->get('/register', [homeCTRL::class, 'showAccueil']);
$app->get('/login', [homeCTRL::class, 'showAccueil']);