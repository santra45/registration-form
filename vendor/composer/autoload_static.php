<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2ee788cc622ebf786f4749fae8b0b575
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2ee788cc622ebf786f4749fae8b0b575::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2ee788cc622ebf786f4749fae8b0b575::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2ee788cc622ebf786f4749fae8b0b575::$classMap;

        }, null, ClassLoader::class);
    }
}
