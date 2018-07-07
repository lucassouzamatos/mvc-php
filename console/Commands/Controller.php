<?php
namespace console\Commands;

use console\Model\AbstractCommand;

class Controller extends AbstractCommand {
    const DIR = 'src/Controller/';
    const TEMPLATE = 'console/Templates/DefaultController.php';

    const MESSAGE_CONTROLLER_EXIST = PHP_EOL . 'Esse controller já existe!';
    const MESSAGE_CONTROLLER_SUCCESS = PHP_EOL . 'Controller %s criado com sucesso!';

    const DIR_ROUTES = 'config/routes.json';

    private $name;

    public function args($args = null) {
        $this->name = $args[0];
    }

    public function command() {
        $this->createTemplate();
        $this->addControllerToRoutes();
    }

    private function createTemplate() {
        $template = file_get_contents(self::TEMPLATE);
        $template = str_replace('default', lcfirst($this->name), $template);
        $template = str_replace('Default', ucfirst($this->name), $template);

        if (is_file(self::DIR . ucfirst($this->name). 'Controller.php')) {
            $this->message = self::MESSAGE_CONTROLLER_EXIST;
            return;
        }

        $file = fopen(self::DIR . ucfirst($this->name). 'Controller.php', 'w');
        fwrite($file, $template);
        fclose($file);

        $this->message = sprintf(self::MESSAGE_CONTROLLER_SUCCESS, $this->name);
    }

    private function addControllerToRoutes() {
        $routes = json_decode(file_get_contents(self::DIR_ROUTES));
        $routes->{$this->name} = str_replace('/', '\\', self::DIR . ucfirst($this->name). 'Controller.php');

        $file = fopen(self::DIR_ROUTES, 'w');

        fwrite($file, json_encode($routes));
        fclose($file);
    }
}