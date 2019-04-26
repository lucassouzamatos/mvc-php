<?php
namespace Container\DependencyInjection;

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

    /**
     * @param $filename
     * @throws \Exception
     */
    public function setFileServices($filename) {
        if (!is_file($filename)) 
            throw new \Exception('O diretório de configurações ' . $filename . ' é inexistente!');
            
        $this->fileServices = $filename;
        
    }
}
