<?php

namespace maxime\sfo\model;
use maxime\sfo\data\Database;

class Users
{

    public ?int $userId;
    public ?string $username;
    public ?string $passwordHash;
    public ?string $role;
    public ?string $createdAt;

    public function __construct()
    {
        $this->userId = null;
        $this->username = null;
        $this->passwordHash = null;
        $this->role = null;
        $this->createdAt = null;
    }

    static function selectUserById($userId)
    {
        $sql = "SELECT `idUser` as userId, `username`, `password_hash` as passwordHash, `role`, `created_at` as createdAt 
                FROM `users` 
                WHERE idUser = :userId";

        $param = [":userId" => $userId];

        $statement = Database::dbrun($sql, $param);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetch();
    }

    static function selectUserByName($username)
    {
        $sql = "SELECT `idUser` as userId, `username`, `password_hash` as passwordHash, `role`, `created_at` as createdAt 
                FROM `users` 
                WHERE username = :username";

        $param = [":username" => $username];

        $statement = Database::dbrun($sql, $param);
        $statement->setFetchMode(\PDO::FETCH_PROPS_LATE | \PDO::FETCH_CLASS, self::class);
        return $statement->fetch();
    }

    static function addUser($username, $passwordHash, $role)
    {
        $sql = "INSERT INTO `users`(`username`, `password_hash`, `role`, `created_at`) 
        VALUES (:username, :passwordHash, :role, NOW())";

        $param = [
            ":username" => $username,
            ":passwordHash" => $passwordHash,
            ":role" => $role,
        ];
        Database::dbrun($sql, $param);
    }
}