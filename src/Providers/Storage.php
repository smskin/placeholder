<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.03.2019
 * Time: 13:34
 */

namespace App\Providers;

class Storage
{
    public static $path = '/storage';

    private static function fixPath(string $path): string
    {
        $slash = $path[0];
        if ($slash !== '/'){
            $path = '/'.$path;
        }
        return $path;
    }

    public static function path(string $path): string
    {
        $path = self::fixPath($path);
        return __ROOT_DIR__.'/public'.self::$path.$path;
    }

    public static function url(string $path): string
    {
        return self::$path.self::fixPath($path);
    }

    public static function exists(string $path): bool
    {
        return file_exists(self::path($path));
    }
}