<?php

declare(strict_types=1);

namespace App\Enum;

enum AppEnvironment: string
{
    case DEVELOPMENT = 'development';
    case PRODUCTION = 'production';

    public static function isProduction($appEnvironment): bool
    {
        return self::tryFrom($appEnvironment) === self::PRODUCTION;
    }

    public static function isDevelopment($appEnvironment): bool
    {
        return self::tryFrom($appEnvironment) === self::DEVELOPMENT;
    }
}