<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf77f9f27a0423b4ac89dd54eb0818423
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Ajaygawade\\Testaipay\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ajaygawade\\Testaipay\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf77f9f27a0423b4ac89dd54eb0818423::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf77f9f27a0423b4ac89dd54eb0818423::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf77f9f27a0423b4ac89dd54eb0818423::$classMap;

        }, null, ClassLoader::class);
    }
}