<?php

namespace Utility;

class Session
{
    public static function get($key)
    {
        if (isset($_SESSION['_flash'][$key])) {
            // Mark this flash item as read
            $_SESSION['_flash_read'][$key] = true;
            return $_SESSION['_flash'][$key];
        }

        return $_SESSION[$key] ?? null;
    }


    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        if (!empty($_SESSION['_flash_read'])) {
            foreach ($_SESSION['_flash_read'] as $key => $read) {
                if ($read && isset($_SESSION['_flash'][$key])) {
                    unset($_SESSION['_flash'][$key]);
                }
            }
            unset($_SESSION['_flash_read']);
        }

        // Clean up empty _flash if everything is removed
        if (empty($_SESSION['_flash'])) {
            unset($_SESSION['_flash']);
        }
    }
    public static function flush()
    {
        $_SESSION = [];
    }
    public static function destroy()
    {
        static::flush();
        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
