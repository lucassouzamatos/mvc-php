<?php

namespace console;

class Commander {

    public function createController($nome) {
        new ControllerCommand($nome);
    }

}