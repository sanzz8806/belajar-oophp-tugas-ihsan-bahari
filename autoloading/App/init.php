<?php

spl_autoload_register(function( $class ) {
    // App\produk\User -> ["App", "produk", "User"]
    $class = explode('\\', $class);
    $class = end($class);
    
    $file = __DIR__ . '/produk/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

spl_autoload_register(function( $class ) {
    // App\service\User -> ["App", "service", "User"]
    $class = explode('\\', $class);
    $class = end($class);
    
    $file = __DIR__ . '/service/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});