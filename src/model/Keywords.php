<?php

namespace maxime\sfo\model;
use maxime\sfo\data\Database;

class Keywords
{

    public ?int $idKeywords;
    public ?string $name;

    public function __construct()
    {
        $this->idKeywords = null;
        $this->name = null;
    }

    /**
     * Get all ads
     * @return array
     */
    static function selectAllKeywords()
    {
        $sql = "SELECT `idKeywords`, `name` FROM `keywords`";
        $statement = Database::dbrun($sql);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetchAll();
    }

    static function selectKeywordsByAdId($adId)
    {
        $sql = "SELECT `idKeywords`, `name` FROM `keywords`, ad_keywords
                WHERE ad_keywords.keyword_id = keywords.idKeywords AND ad_keywords.ad_id = :adId";
        $param = [
            ":adId" => $adId
        ];
        $statement = Database::dbrun($sql, $param);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetchAll();
    }


}