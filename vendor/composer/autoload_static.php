<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1e01ac1c21f674a19a5ec1265735973
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1e01ac1c21f674a19a5ec1265735973::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1e01ac1c21f674a19a5ec1265735973::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc1e01ac1c21f674a19a5ec1265735973::$classMap;

        }, null, ClassLoader::class);
    }
}