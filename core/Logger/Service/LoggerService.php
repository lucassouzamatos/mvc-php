<?php

namespace Logger\Service;

class LoggerService {
    private $namefile;
    const DIR_LOGS = 'logs/';

    public function setNameFile($namefile) {
        $this->namefile = $namefile . '.log';
    }

    public function setContent($content) {
        if (is_file(self::DIR_LOGS . $this->namefile)) {
            $origin = file_get_contents(self::DIR_LOGS . $this->namefile) . PHP_EOL;
            $content = $origin . $content;
        }

        $file = fopen(self::DIR_LOGS . $this->namefile, 'w');

        fwrite($file, $content);

    }
}