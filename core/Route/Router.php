<?php
namespace Route;

use Annotations\Annotations;
use FileSystem\JsonReader;

class Router {

    /**
     * Router constructor.
     * @param Annotations $annotations
     * @param JsonReader $jsonReader
     * @throws \ReflectionException
     */
    public function __construct(Annotations $annotations, JsonReader $jsonReader) {
        $content = $jsonReader->setName("config/routes")->readFile();
        $content = (array) $content;

        foreach ($content as $key => $class) {
            $comments = $annotations->getByAnnotation($class, 'Route');

            foreach ($comments as $comment) {
                if ($comment->value == $_SERVER['REQUEST_URI']) {
                    return (new $class())->{$comment->name}();
                }
            }
        }
    }
}