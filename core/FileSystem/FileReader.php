<?php
namespace core\FileSystem;

interface FileReader {

    public function createFile();

    public function readFile();

    public function setName($name);

}