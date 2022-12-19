<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5bf6e437b25630d0c6df8d56c4667cb0
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5bf6e437b25630d0c6df8d56c4667cb0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5bf6e437b25630d0c6df8d56c4667cb0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5bf6e437b25630d0c6df8d56c4667cb0::$classMap;

        }, null, ClassLoader::class);
    }
}
