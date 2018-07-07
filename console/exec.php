<?php

require_once "autoload.php";
$commander = new \console\Commander();

echo "  _____  ____    _  __   ____  ____    __    ____        ____   ___    ___    __  ___   ____  _      __  ____    ___    __ __
       / ___/ / __ \  / |/ /  / __/ / __ \  / /   / __/       / __/  / _ \  / _ |  /  |/  /  / __/ | | /| / / / __ \  / _ \  / //_/
      / /__  / /_/ / /    /  _\ \  / /_/ / / /__ / _/        / _/   / , _/ / __ | / /|_/ /  / _/   | |/ |/ / / /_/ / / , _/ / ,<
      \___/  \____/ /_/|_/  /___/  \____/ /____//___/       /_/    /_/|_| /_/ |_|/_/  /_/  /___/   |__/|__/  \____/ /_/|_| /_/|_|
                                                                                                                                   ";

const COMMANDS = PHP_EOL . "create:controller ~ Criar controller";

const SUCCESS_CONTROLLER_CREATE = PHP_EOL . "Controller criado com sucesso!";

const COMMAND_ERROR =  PHP_EOL . 'O comando %s não existe!';

if (!isset($argv[1])) {
    echo COMMANDS;
    exit;
}

switch ($argv[1]) {
    case "help":
        echo COMMANDS;
        break;

    case "create:controller":
        $commander->createController($argv[2]);
        echo SUCCESS_CONTROLLER_CREATE;
        break;


    default:
        echo COMMAND_ERROR;
}
