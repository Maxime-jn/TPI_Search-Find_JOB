<?php

namespace maxime\sfo\model;
use maxime\sfo\data\Database;

class Session
{

    /**
     * Login user session
     * @param string $username
     */
    static function login(string $username): void
    {
        $_SESSION['isConnected'] = true;
        $_SESSION["username"] = $username;
    }

    /**
     * Logout user and destroy session
     */
    static function logout()
    {
        session_unset();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }

    /**
     * Get current username
     * @return string|false
     */
    static function getUsername(): string|false
    {
        if (isset($_SESSION["username"]) && $_SESSION["username"] != "") {
            return $_SESSION["username"];
        } else {
            return false;
        }
    }

    /**
     * Check if user is connected
     * @return bool
     */
    static function isConnected(): bool
    {
        if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"] == true) {
            return true;
        } else {
            return false;
        }
    }
}