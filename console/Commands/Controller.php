<?php

namespace console;

class ControllerCommand {

    const DIR = 'src/Controller/';
    const TEMPLATE = 'console/Templates/DefaultController.php';

    const MESSAGE_CONTROLLER_EXIST = PHP_EOL . 'Esse controller já existe!';

    const DIR_ROUTES = 'config/routes.json';

    private $name;

    public function __construct($name) {
        $this->name = $name;
        $this->createTemplate();
        $this->addControllerToRoutes();
    }

    private function createTemplate() {
        $template = file_get_contents(self::TEMPLATE);
        $template = str_replace('default', lcfirst($this->name), $template);
        $template = str_replace('Default', ucfirst($this->name), $template);

        if (is_file(self::DIR . ucfirst($this->name). 'Controller.php')) {
            echo self::MESSAGE_CONTROLLER_EXIST;
            exit;
        }

        $file = fopen(self::DIR . ucfirst($this->name). 'Controller.php', 'w');
        fwrite($file, $template);
        fclose($file);
    }

    private function addControllerToRoutes() {
        $routes = json_decode(file_get_contents(self::DIR_ROUTES));
        $routes->{$this->name} = str_replace('/', '\\', self::DIR . ucfirst($this->name). 'Controller.php');

        $file = fopen(self::DIR_ROUTES, 'w');

        fwrite($file, json_encode($routes));
        fclose($file);
    }
}