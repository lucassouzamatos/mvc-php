<?php

namespace console;

class ControllerCommand {

    const DIR = '../src' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR;
    const TEMPLATE = 'DefaultCreateds' . DIRECTORY_SEPARATOR . 'DefaultController.php';

    private $name;

    public function __construct($name) {
        $this->name = $name;
        $this->createTemplate();
    }

    private function createTemplate() {
        $template = file_get_contents(self::TEMPLATE);
        $template = str_replace('default', $this->name, $template);
        $template = str_replace('Default', ucfirst($this->name), $template);

        if (is_file(self::DIR . ucfirst($this->name). 'Controller.php')) {
            echo 'Esse controller já existe!';
            exit;
        }

        $file = fopen(self::DIR . ucfirst($this->name). 'Controller.php', 'w');
        fwrite($file, $template);
        fclose($file);
    }
}