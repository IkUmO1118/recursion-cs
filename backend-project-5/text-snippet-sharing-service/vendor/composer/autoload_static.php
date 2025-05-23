<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit134a48ff07bef11e889d5ef1c681b5c7
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Views\\' => 6,
        ),
        'S' => 
        array (
            'Seeds\\' => 6,
        ),
        'R' => 
        array (
            'Routing\\' => 8,
            'Response\\' => 9,
            'Render\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
            'Programs\\' => 9,
        ),
        'M' => 
        array (
            'Migrations\\' => 11,
        ),
        'H' => 
        array (
            'Helpers\\' => 8,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
        'E' => 
        array (
            'Exceptions\\' => 11,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'C' => 
        array (
            'Commands\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Views',
        ),
        'Seeds\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database/Seeds',
        ),
        'Routing\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Routing',
        ),
        'Response\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Response',
        ),
        'Render\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Response/Render',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Programs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Commands/Programs',
        ),
        'Migrations\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database/Migrations',
        ),
        'Helpers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Helpers',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
        'Exceptions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Exceptions',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database',
        ),
        'Commands\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Commands',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit134a48ff07bef11e889d5ef1c681b5c7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit134a48ff07bef11e889d5ef1c681b5c7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit134a48ff07bef11e889d5ef1c681b5c7::$classMap;

        }, null, ClassLoader::class);
    }
}
