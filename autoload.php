<?php
spl_autoload_register(function($class) {
    if (is_file('core/' . $class . '.php')) {
        require_once 'core/' . $class . '.php';
    } else {
        require_once $class . '.php';
    }
});