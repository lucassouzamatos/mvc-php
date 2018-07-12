<?php
namespace Container\DependencyInjection;

abstract class DependencyInjectionModel {
    protected $fileServices;
    protected $classWorking;
    protected $instances;

    abstract function builder($class);

    protected function instancing() {
        return new $this->classWorking(...$this->instances);
    }

    public function getServices() {
        return json_decode(file_get_contents($this->fileServices));
    }
}