<?php

namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
        $namespace = __NAMESPACE__ . '\\';

        // Vérifie si la classe utilise le namespace de l'application
        if (strpos($class, $namespace) === 0) {
            $class = str_replace($namespace, '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }
}
