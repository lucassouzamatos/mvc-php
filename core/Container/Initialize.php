<?php
namespace core\Container;

use core\Container\DependencyInjection\DependencyInjectionContainer;

class Initialize {
    private $dependencyInjection;

    public function __construct() {
        $this->dependencyInjection = new DependencyInjectionContainer();
        $this->initializeDependency();
    }

    private function initializeDependency() {
        $this->dependencyInjection->builder();
    }
}