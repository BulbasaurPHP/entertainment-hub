<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad08adf228bec457e2d98e73329fae7e
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad08adf228bec457e2d98e73329fae7e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad08adf228bec457e2d98e73329fae7e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad08adf228bec457e2d98e73329fae7e::$classMap;

        }, null, ClassLoader::class);
    }
}
