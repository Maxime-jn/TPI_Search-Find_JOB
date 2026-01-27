<?php

namespace maxime\sfo\model;
use maxime\sfo\data\Database;

class Users
{

    public ?int $idUser;
    public ?int $username;
    public ?string $password_hash;
    public ?string $role;
    public ?string $created_at;

    public function __construct()
    {
        $this->idUser = null;
        $this->username = null;
        $this->password_hash = null;
        $this->role = null;
        $this->created_at = null;
    }

    static function selectUserById($idUser)
    {
        $sql = "SELECT `idUser`, `username`, `password_hash`, `role`, `created_at` 
                FROM `users` 
                WHERE idUser = :idUser";

        $param = [":idUser" => $idUser];

        $statement = Database::dbrun($sql, $param);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetch();
    }

    static function addUser($username, $password_hash, $role)
    {
        $sql = "INSERT INTO `users`(`username`, `password_hash`, `role`, `created_at`) 
        VALUES (:username, :password_hash, :role, NOW())";

        $param = [
            ":username" => $username,
            ":password_hash" => $password_hash,
            ":role" => $role,
        ];
        Database::dbrun($sql, $param);
    }
}