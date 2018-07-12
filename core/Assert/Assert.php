<?php
namespace Assert;

use FileSystem\JsonReader;

class Assert {

    private $jsonReader;

    public function __construct(JsonReader $jsonReader) {
        $this->jsonReader = $jsonReader;
    }

    public static function get($assert) {

    }

    public function generate() {
        var_dump($this->jsonReader);
        die;
    }

}