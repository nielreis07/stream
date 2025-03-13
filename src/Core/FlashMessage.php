<?php

namespace App\Core;

Class FlashMessage {

    public function init() {
        session_start();
    }

    public static function set(string $key, string $message, string $type = 'success'): void {
        session_start();
        $_SESSION['flash_message'][$key] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function get(string $key): array|null {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $flash = null;
        if (isset($_SESSION['flash_message'][$key])) {
            $flash = $_SESSION['flash_message'][$key];
        }
        return $flash;
    }

    public static function clear(string $key): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['flash_message'][$key]);
    }
}
