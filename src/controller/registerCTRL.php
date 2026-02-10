<?php

namespace maxime\sfo\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use maxime\sfo\controller\baseCTRL;
use maxime\sfo\model\Users;
use maxime\sfo\model\Session;
use maxime\sfo\data\Database;

class registerCTRL extends baseCTRL
{
    function showRegisterPage(Request $request, Response $response)
    {
        if (Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/");
        }

        $layoutData = [
            'title' => 'Inscription'
        ];

        $pageName = "register.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }

    /**
     * Handle registration form submission
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return mixed
     */
    function handleRegisterPost(Request $request, Response $response)
    {
        $error = "";
        $requestBody = $request->getParsedBody();

        if ($requestBody != null) {
            try {
                if (empty($requestBody["username"]) || empty($requestBody["password"]) || empty($requestBody["role"])) {
                    $error = "Tous les champs sont obligatoires";
                } elseif ($requestBody["password"] !== $requestBody["confirm_password"]) {
                    $error = "Les mots de passe ne correspondent pas";
                } else {

                    if (Users::selectUserByName($requestBody["username"]) !== false) {
                        $error = "Ce nom d'utilisateur est déjà pris";
                    } else {
                        Database::beginTransaction();
                        Users::addUser($requestBody["username"], password_hash($requestBody["password"], PASSWORD_BCRYPT), $requestBody["role"]);
                        Database::commit();
                        Session::login($requestBody["username"]);
                    }
                }
            } catch (\Exception $e) {
                Database::rollBack();
                $error = "Une erreur est survenue lors de l'inscription: " . $e->getMessage();
            }
        }

        if (empty($error)) {
            return baseCTRL::redirectWithStatus($response, "/annonces");
        }

        $layoutData = [
            'title' => 'Inscription',
            'error' => $error
        ];

        $pageName = "register.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }

}