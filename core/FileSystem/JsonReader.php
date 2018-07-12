<?php
namespace FileSystem;

class JsonReader implements FileReader {

    private $name;

    public function createFile()
    {
    }

    public function readFile()
    {
        return json_decode(file_get_contents($this->name));
    }

    public function setName($name) {
        $this->name = $name . FileReaderTypes::JSON;
        return $this;
    }
}