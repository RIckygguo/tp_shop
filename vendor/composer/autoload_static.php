<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit105f1bc1d3456136fb0c152f383ad6b4
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\composer\\' => 15,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-installer/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit105f1bc1d3456136fb0c152f383ad6b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit105f1bc1d3456136fb0c152f383ad6b4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
