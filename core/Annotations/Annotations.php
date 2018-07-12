<?php

namespace Annotations;

class Annotations {

    /**
     * @param $class
     * @param $annotation
     * @return array
     * @throws \ReflectionException
     */
    public function getByAnnotation($class, $annotation) {
        $results = array();

        $arr = new \stdClass();

        $refClass = new \ReflectionClass($class);
        $arr->name = $class;
        $arr->isClass = true;

        $arr->value = $this->getValue($refClass, $annotation);
        $results[] = $arr;

        foreach ($refClass->getMethods() as $method) {
            $arr = new \stdClass();

            $arr->name = $method->name;
            $arr->isClass = false;
            $arr->value = $this->getValue($method, $annotation);

            $results[] = $arr;
        }
        return $results;
    }

    /**
     * @param mixed $refClass
     * @param $annotation
     * @return mixed
     */
    private function getValue($refClass, $annotation) {
        preg_match_all('/\(+(.*?)\)/', $refClass->getDocComment(), $resultado);

        if(isset($resultado[1][0])) {
            return str_replace($annotation . '=', '', $resultado[1][0]);
        }

        return null;
    }

}