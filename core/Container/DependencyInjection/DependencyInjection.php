<?php
namespace core\Container\DependencyInjection;

class DependencyInjection extends DependencyInjectionModel {

    public function __construct() {
        $this->fileServices = "config/services.json";
    }

    public function builder($class) {
        $content = $this->getServices();

        foreach ($content->{$class} as $instance){
            $this->instances[] = $instance;
        }

        return new $class(...$this->instances);
    }
}