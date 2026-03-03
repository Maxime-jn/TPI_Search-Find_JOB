<?php

namespace maxime\sfo\model;
use maxime\sfo\data\Database;

class Ads
{

    public ?int $adsId;
    public ?int $userId;
    public ?string $title;
    public ?string $description;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?string $authorName;

    public function __construct()
    {
        $this->adsId = null;
        $this->userId = null;
        $this->description = null;
        $this->createdAt = null;
        $this->updatedAt = null;
        $this->authorName = null;
    }

    /**
     * Get all ads
     * @return array
     */
    static function selectAllAds()
    {
        $sql = "SELECT `idAds`, `user_id`, `title`, `description`, `created_at`, `updated_at` 
                FROM `ads`";
        $statement = Database::dbrun($sql);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetchAll();
    }

    /**
     * Get a single ad by its id
     * @param int $adId
     * @return Ads|false
     */
    static function selectAdById($adId)
    {
        $sql = "SELECT a.`idAds`, a.`user_id`, a.`title`, a.`description`, a.`created_at`, a.`updated_at`, u.`username` as authorName
                FROM `ads` a
                JOIN `users` u ON u.`idUser` = a.`user_id`
                WHERE a.`idAds` = :adId";
        $param = [":adId" => $adId];
        $statement = Database::dbrun($sql, $param);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetch();
    }

    /**
     * Add new ad
     * @param int $userId
     * @param string $title
     * @param string $description
     */
    static function addAds($userId, $title, $description)
    {
        $sql = "INSERT INTO `ads`(`user_id`, `title`, `description`, `created_at`, `updated_at`) 
        VALUES (:userId, :title, :description, NOW(), NOW())";
        $param = [
            ":userId" => $userId,
            ":title" => $title,
            ":description" => $description,
        ];
        Database::dbrun($sql, $param);
    }

    /**
     * Link a keyword to an ad
     * @param int $adId
     * @param int $keywordId
     */
    static function addAdKeyword($adId, $keywordId)
    {
        $sql = "INSERT INTO `ad_keywords`(`ad_id`, `keyword_id`) VALUES (:adId, :keywordId)";
        $param = [
            ":adId" => $adId,
            ":keywordId" => $keywordId,
        ];
        Database::dbrun($sql, $param);
    }

    /**
     * Delete ad by id
     * @param int $adsId
     */
    static function deleteAds($adsId)
    {
        // Supprimer d'abord les mots-clés liés
        $sqlKw = "DELETE FROM `ad_keywords` WHERE ad_id = :id";
        Database::dbrun($sqlKw, [":id" => $adsId]);

        // Supprimer l'annonce
        $sql = "DELETE FROM `ads` WHERE idAds = :id";
        Database::dbrun($sql, [":id" => $adsId]);
    }
}