<?php

namespace PhatKoala;

class Asset
{
    private static $manifest;

    private static $entrypoints;

    public static function getManifest()
    {
        if (is_null(self::$manifest)) {
            self::$manifest = json_decode(file_get_contents(sprintf('%s/build/manifest.json', getcwd())), true);;
        }

        return self::$manifest;
    }

    public static function getEntrypoints()
    {
        if (is_null(self::$entrypoints)) {
            self::$entrypoints = json_decode(file_get_contents(sprintf('%s/build/entrypoints.json', getcwd())), true);;
        }

        return self::$entrypoints;
    }

    public static function file(string $file)
    {
        $manifest = self::getManifest();

        if (isset($manifest[$file])) {
            return $manifest[$file];
        }

        return null;
    }

    public static function entrypoint(string $name)
    {
        $entrypoints = self::getEntrypoints();

        if (isset($entrypoints[$name])) {
            return $entrypoints[$name];
        }

        return null;
    }
}
