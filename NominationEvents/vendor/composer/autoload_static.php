<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a749b24d265addfa7238b4d9abbfdbd
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a749b24d265addfa7238b4d9abbfdbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a749b24d265addfa7238b4d9abbfdbd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5a749b24d265addfa7238b4d9abbfdbd::$classMap;

        }, null, ClassLoader::class);
    }
}
