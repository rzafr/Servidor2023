<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb61e6078aa59f7dc3d95f94602559fb7
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitb61e6078aa59f7dc3d95f94602559fb7', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb61e6078aa59f7dc3d95f94602559fb7', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb61e6078aa59f7dc3d95f94602559fb7::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}