<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0468de23a2911f99ba8baa32b80240e
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0468de23a2911f99ba8baa32b80240e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0468de23a2911f99ba8baa32b80240e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
