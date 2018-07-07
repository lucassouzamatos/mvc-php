<?php

namespace console;

use console\Model\CommandModel;

class Commander {

    const CONTROLLER_CREATE = "create:controller";
    const SERVER_INIT =       "server:init";

    const COMMAND_ERROR =  PHP_EOL . 'O comando %s não existe!';

    public static function getAllCommands() {
        return
            PHP_EOL . self::CONTROLLER_CREATE .
            PHP_EOL . self::SERVER_INIT;
    }

    public function execCommand($args) {

        $command = $args[1];

        $commands = array(
            self::CONTROLLER_CREATE => 'console\\Commands\\Controller',
            self::SERVER_INIT => 'console\\Commands\\Server'
        );

        if (!isset($commands[$command])) {
            echo sprintf(self::COMMAND_ERROR, $command);
            exit;
        }

        unset($args[0]);
        unset($args[1]);
        $args = array_values($args);

        /** @var CommandModel $commandControll */
        $commandControll = new $commands[$command]();
        $commandControll->args($args);
        $commandControll->command();

        echo PHP_EOL . $commandControll->messageReturn();

        exit;
    }
}