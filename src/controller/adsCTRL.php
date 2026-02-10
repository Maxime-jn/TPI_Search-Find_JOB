<?php

namespace maxime\sfo\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use maxime\sfo\controller\baseCTRL;
use maxime\sfo\model\Session;
use maxime\sfo\model\Ads;

class adsCTRL extends baseCTRL
{
    function showAds(Request $request, Response $response)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $ads = Ads::selectAllAds();

        $layoutData = [
            'title' => 'Annonces',
            'ads' => $ads
        ];

        $pageName = "annonces.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }

    function showAdDetail(Request $request, Response $response, array $args)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $layoutData = [
            'title' => 'Détail de l\'annonce',
            'id' => $args['id'] ?? null
        ];

        $pageName = "annonce_detail.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }

    function showAddAd(Request $request, Response $response)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $layoutData = [
            'title' => 'Publier une annonce'
        ];

        $pageName = "annonce_add.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }

    function showEditAd(Request $request, Response $response, array $args)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $layoutData = [
            'title' => 'Modifier l\'annonce',
            'id' => $args['id'] ?? null
        ];

        $pageName = "annonce_edit.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }
}
