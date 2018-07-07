<?php
namespace console;

class ServerCommand {

    public function init() {
        echo PHP_EOL . 'Servidor iniciado em localhost:8000';
        exec('php -S localhost:8000 -t ./');
        exit;
    }

}