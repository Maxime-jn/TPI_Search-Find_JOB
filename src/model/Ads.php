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

    public function __construct()
    {
        $this->adsId = null;
        $this->userId = null;
        $this->description = null;
        $this->createdAt = null;
        $this->updatedAt = null;
    }

    /**
     * Get all ads
     * @return array
     */
    static function selectAllAds()
    {
        $sql = "SELECT `idAds`, `user_id`, `title`, `description`, `created_at`, `updated_at` , keywords.name as keyword
                FROM `ads`, ad_keywords, keywords
                WHERE idAds = ad_keywords.ad_id AND ad_keywords.keyword_id = keywords.idKeywords";
        $statement = Database::dbrun($sql);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetchAll();
    }

    /**
     * Add new ad
     * @param int $userId
     * @param string $title
     * @param string $description
     */
    // static function addAds($userId, $title, $description)
    // {
    //     $sql = "INSERT INTO `ads`(`user_id`, `title`, `description`, `created_at`, `updated_at`) 
    //     VALUES (:userId, :title, :description, NOW(), NOW())";
    //     $param = [
    //         ":userId" => $userId,
    //         ":title" => $title,
    //         ":description" => $description,
    //     ];
    //     Database::dbrun($sql, $param);
    // }

    /**
     * Delete ad by id
     * @param int $adsId
     */
    // static function deleteAds($adsId)
    // {
    //     $sql = "DELETE FROM `ads` WHERE idAds = :id";
    //     $param = [":id" => $adsId];
    //     Database::dbRun($sql, $param);
    // }

    /**
     * Update ad
     */
    // static function updateAds()
    // {
    // }

}