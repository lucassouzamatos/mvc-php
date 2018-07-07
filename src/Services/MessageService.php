<?php
namespace src\Services;

class MessageService {

    const ERROR = 'error';
    const SUCCESS = 'success';

    public function setMessage($mode, $message) {
        echo $message;
    }
}