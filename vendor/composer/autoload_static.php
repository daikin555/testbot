<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9771e29da84b85b6b2d1d198ab0a9925
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9771e29da84b85b6b2d1d198ab0a9925::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9771e29da84b85b6b2d1d198ab0a9925::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
