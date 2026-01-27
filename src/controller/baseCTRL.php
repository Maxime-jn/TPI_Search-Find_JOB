<?php
namespace maxime\sfo\controller;

use Slim\Views\PhpRenderer;


class baseCTRL
{

    static function redirectIndex($response, $location)
    {
        return $response
            ->withHeader('Location', $location)
            ->withStatus(302);
    }

    static function phpView($dataLayout, $response, $namePage)
    {
        $phpView = new PhpRenderer(__DIR__ . '/../../views', $dataLayout);
        $phpView->setLayout("layout.php");
        return $phpView->render($response, $namePage);
    }

}