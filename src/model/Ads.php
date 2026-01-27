<?php

namespace maxime\sfo\model;
use maxime\sfo\data\Database;

class Batches
{

    public ?int $idAds;
    public ?int $user_id;
    public ?string $title;
    public ?string $description;
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct()
    {
        $this->idAds = null;
        $this->user_id = null;
        $this->description = null;
        $this->created_at = null;
        $this->updated_at = null;
    }
    /**
     * Summary of selectAllGalery
     * @return array
     */
    // static function selectAllAds()
    // {
    //     $sql = "SELECT `idAds`, `user_id`, `title`, `description`, `created_at`, `updated_at` FROM `ads`";

    //     $statement = Database::dbrun($sql);
    //     $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
    //     return $statement->fetchAll();

    // }


    // static function addAds($user_id, $title, $description, )
    // {
    //     $sql = "INSERT INTO `ads`(`user_id`, `title`, `description`, `created_at`, `updated_at`) 
    //     VALUES (:name, :typeBatches)";

    //     $param = [
    //         ":name" => $name,
    //         ":typeBatches" => $type,
    //     ];
    //     Database::dbrun($sql, $param);
    // }

    // static function deleteAds($idBatche)
    // {
    //     $sql = "DELETE FROM `Batches` WHERE idBatche = :id";

    //     $param = [":id" => $idBatche];

    //     Database::dbRun($sql, $param);
    // }

    // static function updateAds()

}