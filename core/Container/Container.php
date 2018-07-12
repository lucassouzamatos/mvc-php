<?php
namespace Container;

use Container\DependencyInjection\DependencyInjection;

class Container {
    public function getService($class) {
        $class = str_replace("/", "\\", $class);
        return (new DependencyInjection())->builder($class);
    }
}