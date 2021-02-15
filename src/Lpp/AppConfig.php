<?php

namespace Lpp;

class AppConfig
{
    /**
     * @return array
     */
    public static function getConfig(): array
    {
        if (file_exists(__DIR__ . '/../config/config.php')) {
            return include __DIR__ . '/../config/config.php';
        }

        return [];
    }
}