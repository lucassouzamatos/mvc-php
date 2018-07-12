<?php
namespace Container\DependencyInjection;

/**
 * Class DependencyInjectionContainer
 * @package Container\DependencyInjection
 *
 * Inicia com o container, sendo responsável por iniciar todos os services
 */
class DependencyInjectionContainer extends DependencyInjectionModel {

    public function __construct() {
        $this->fileServices = "core/config/services.json";
    }

    public function builder($class = null) {
        $content = $this->getServices();

        foreach ($content as $class => $classesDependency) {
            $this->classWorking = $class;
            $this->instances = array();

            foreach ($classesDependency as $classDependency) {
                $this->instances[] = new $classDependency();
            }

            $this->instancing();
        }
    }
}