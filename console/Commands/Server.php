<?php
namespace console\Commands;

use console\Model\AbstractCommand;

class Server extends AbstractCommand {

    public function command() {
        echo PHP_EOL . 'Servidor iniciado em localhost:8000';
        exec('php -S localhost:8000 -t ./');
    }

    public function args($args = null) {
    }
}