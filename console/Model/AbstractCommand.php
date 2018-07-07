<?php

namespace console\Model;

abstract class AbstractCommand implements CommandModel {

    protected $message = '';

    public function messageReturn() {
        return $this->message;
    }
}