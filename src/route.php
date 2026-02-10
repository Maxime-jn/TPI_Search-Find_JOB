<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use maxime\sfo\controller\adsCTRL;
use maxime\sfo\controller\userCTRL;
use maxime\sfo\controller\loginCTRL;
use maxime\sfo\controller\registerCTRL;


$app->get('/', [adsCTRL::class, 'showAds']);


$app->get('/register', [registerCTRL::class, 'showRegisterPage']);
$app->post('/register', [registerCTRL::class, 'handleRegisterPost']);


$app->get('/login', [loginCTRL::class, 'showLoginPage']);
$app->post('/login', [loginCTRL::class, 'handleLoginPost']);

$app->get('/logout', [loginCTRL::class, 'handleLogout']);

// Routes for ads
$app->get('/annonces', [adsCTRL::class, 'showAds']);
$app->get('/annonces/ajouter', [adsCTRL::class, 'showAddAd']);
$app->get('/annonces/{id}', [adsCTRL::class, 'showAdDetail']);
$app->get('/annonces/{id}/modifier', [adsCTRL::class, 'showEditAd']);