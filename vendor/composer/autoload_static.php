<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2316fa90c0f00487a7352629e92410c3
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mvc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2316fa90c0f00487a7352629e92410c3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2316fa90c0f00487a7352629e92410c3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
