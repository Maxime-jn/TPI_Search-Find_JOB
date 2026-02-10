<?php
namespace maxime\sfo\controller;

use Slim\Views\PhpRenderer;
use maxime\sfo\model\Session;

class baseCTRL
{

    static function redirectWithStatus($response, $location)
    {
        return $response
            ->withHeader('Location', $location)
            ->withStatus(302);
    }

    static function renderView($layoutData, $response, $pageName)
    {

        if (Session::isConnected()) {
            $layoutData = array_merge($layoutData ?? [], [
                'isConnected' => true,
                'username' => Session::getUsername(),
            ]);
        } else {
            $layoutData = array_merge($layoutData ?? [], [
                'isConnected' => false,
            ]);
        }

        $phpView = new PhpRenderer(__DIR__ . '/../../views', $layoutData);
        $phpView->setLayout("layout.php");
        return $phpView->render($response, $pageName);
    }

}