<?php
namespace Container;

use Container\DependencyInjection\DependencyInjectionContainer;

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