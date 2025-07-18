<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79bb29a23aa4aa2e49ffadd2e5397880
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Oxapay\\Oxapay\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Oxapay\\Oxapay\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit79bb29a23aa4aa2e49ffadd2e5397880::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79bb29a23aa4aa2e49ffadd2e5397880::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79bb29a23aa4aa2e49ffadd2e5397880::$classMap;

        }, null, ClassLoader::class);
    }
}
