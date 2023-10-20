<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf123f52056104f6d7ee049c4796f9755
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Layerdrops\\Agriox\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Layerdrops\\Agriox\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf123f52056104f6d7ee049c4796f9755::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf123f52056104f6d7ee049c4796f9755::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf123f52056104f6d7ee049c4796f9755::$classMap;

        }, null, ClassLoader::class);
    }
}