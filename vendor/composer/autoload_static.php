<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5b97dd5e11ec4fcd8ea3fb834df14874
{
    public static $files = array (
        '29a57508a97872b78f4132a4ec912bfe' => __DIR__ . '/../..' . '/app/Support/helpers.php',
    );

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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5b97dd5e11ec4fcd8ea3fb834df14874::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5b97dd5e11ec4fcd8ea3fb834df14874::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5b97dd5e11ec4fcd8ea3fb834df14874::$classMap;

        }, null, ClassLoader::class);
    }
}