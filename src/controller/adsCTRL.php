<?php

namespace maxime\sfo\controller;

use maxime\sfo\data\Database;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use maxime\sfo\controller\baseCTRL;
use maxime\sfo\model\Session;
use maxime\sfo\model\Ads;
use maxime\sfo\model\Keywords;
use maxime\sfo\model\Users;

class adsCTRL extends baseCTRL
{
    function showAds(Request $request, Response $response)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $param = $request->getQueryParams();
        $search = $param['search'] ?? '';

        if ($search) {
            $ads = Ads::searchAds($search);
        } else {
            $ads = Ads::selectAllAds();
        }

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

        $id = $args['id'] ?? null;

        if (!$id) {
            return baseCTRL::redirectWithStatus($response, "/annonces");
        }

        $ad = Ads::selectAdById($id);

        if (!$ad) {
            return baseCTRL::redirectWithStatus($response, "/annonces");
        }

        $keywords = Keywords::selectKeywordsByAdId($id);

        $currentUser = Users::selectUserByName(Session::getUsername());
        $isOwner = ($currentUser && $currentUser->userId == $ad->userId);

        $layoutData = [
            'title' => $ad->title,
            'ad' => $ad,
            'adKeywords' => $keywords,
            'isOwner' => $isOwner
        ];

        $pageName = "annonce_detail.php";

        return baseCTRL::renderView($layoutData, $response, $pageName);
    }

    function showAddAd(Request $request, Response $response)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $keywords = Keywords::selectAllKeywords();

        $layoutData = [
            'title' => 'Publier une annonce',
            'keywords' => $keywords
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


    function addAdPost(Request $request, Response $response)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $data = $request->getParsedBody();

        $title = $data['title'] ?? null;
        $description = $data['description'] ?? null;
        $keywordIds = $data['keywords'] ?? [];

        if (!$title || !$description || empty($keywordIds)) {
            return baseCTRL::redirectWithStatus($response, "/annonces/ajouter");
        } else {
            try {
                Database::beginTransaction();

                $username = Session::getUsername();
                $user = Users::selectUserByName($username);

                Ads::addAds($user->userId, $title, $description);
                $adId = Database::lastInsertId();

                foreach ($keywordIds as $keywordId) {
                    Ads::addAdKeyword($adId, (int) $keywordId);
                }

                Database::commit();

            } catch (\Exception $e) {
                Database::rollback();
                return baseCTRL::redirectWithStatus($response, "/annonces/ajouter");
            }
        }



        return baseCTRL::redirectWithStatus($response, "/annonces");
    }

    function deleteAds(Request $request, Response $response, array $args)
    {
        if (!Session::isConnected()) {
            return baseCTRL::redirectWithStatus($response, "/login");
        }

        $id = $args['id'] ?? null;

        if (!$id) {
            return baseCTRL::redirectWithStatus($response, "/annonces");
        }

        try {
            Database::beginTransaction();
            Ads::deleteAds((int) $id);
            Database::commit();
        } catch (\Exception $e) {
            Database::rollback();
            return baseCTRL::redirectWithStatus($response, "/annonces/" . $id);
        }

        return baseCTRL::redirectWithStatus($response, "/annonces");
    }
}
