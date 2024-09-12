<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9e2c000cc2f8d95743b878f853fb951a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pzn\\Composer\\' => 13,
            'Pzn\\BelajarMembuatLibrary\\' => 26,
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pzn\\Composer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Pzn\\BelajarMembuatLibrary\\' => 
        array (
            0 => __DIR__ . '/..' . '/pzn/belajar-membuat-library/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9e2c000cc2f8d95743b878f853fb951a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9e2c000cc2f8d95743b878f853fb951a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9e2c000cc2f8d95743b878f853fb951a::$classMap;

        }, null, ClassLoader::class);
    }
}