<?php

namespace maxime\sfo\data;


class Database
{

    private static ?\PDO $pdo = null;

    public static function db(): \PDO
    {
        if (self::$pdo === null) {
            $pdo = new \PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );

            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

            self::$pdo = $pdo;
        }

        return self::$pdo;
    }

    static function dbRun(string $sql, array $param = []): \PDOStatement
    {
        $statement = self::db()->prepare($sql);

        if (empty($param)) {
            $statement->execute();
        } else {
            $statement->execute($param);
        }

        return $statement;
    }

    /**
     * Begin database transaction
     * @return bool
     */
    static function beginTransaction()
    {
        return self::db()->beginTransaction();
    }

    /**
     * Commit database transaction
     * @return bool
     */
    static function commit()
    {
        return self::db()->commit();
    }

    /**
     * Rollback database transaction
     * @return bool
     */
    static function rollback()
    {
        return self::db()->rollBack();
    }

    /**
     * Get last inserted id
     * @return bool|string
     */
    static function lastInsertId()
    {
        return self::db()->lastInsertId();
    }
}