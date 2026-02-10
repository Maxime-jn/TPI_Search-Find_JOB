<?php

namespace maxime\sfo\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use maxime\sfo\controller\baseCTRL;
use maxime\sfo\model\Users;
use maxime\sfo\model\Session;

class loginCTRL extends baseCTRL
{
    function showLoginPage(Request $request, Response $response)
    {
        if (Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/");
        }

        $layoutData = [
            'title' => 'Connexion'
        ];

        $pageName = "login.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }


    /**
     * Handle login form submission
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return mixed
     */
    function handleLoginPost(Request $request, Response $response)
    {
        $error = "";
        $requestBody = $request->getParsedBody();

        if ($requestBody != null) {
            try {
                if (empty($requestBody["username"]) || empty($requestBody["password"])) {
                    $error = "Tous les champs sont obligatoires";
                } else {

                    $user = Users::selectUserByName($requestBody["username"]);

                    if ($user === false) {
                        $error = "Nom d'utilisateur ou mot de passe incorrect";
                    } else {

                        if (password_verify($requestBody["password"], $user->passwordHash)) {
                            Session::login($requestBody["username"]);
                        } else {
                            $error = "Nom d'utilisateur ou mot de passe incorrect";
                        }
                    }
                }
            } catch (\Exception $e) {
                $error = "Une erreur est survenue lors de la connexion: " . $e->getMessage();
            }
        }

        if (empty($error)) {
            return baseCTRL::redirectWithStatus($response, "/annonces");
        }

        $layoutData = [
            'title' => 'Connexion',
            'error' => $error
        ];

        $pageName = "login.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }

    /**
     * Handle user logout
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return Response
     */
    function handleLogout(Request $request, Response $response)
    {
        Session::logout();

        return baseCTRL::redirectWithStatus($response, "/");
    }

}