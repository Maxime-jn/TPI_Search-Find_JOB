<?php

namespace maxime\sfo\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use maxime\sfo\controller\baseCTRL;
use maxime\sfo\model\Users;

class userCTRL extends baseCTRL
{
    function showConnexion(Request $request, Response $response)
    {
        // $batches = ads::selectAllBatche();

        $dataLayout = [
            // 'batches' => $batches,
            'title' => 'Accueil'
        ];

        $namePage = "Accueil.php";

        return baseCTRL::phpView($dataLayout, $response, $namePage);

    }

}