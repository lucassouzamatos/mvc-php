<?php

namespace tests;

use Annotations\Annotations;
use PHPUnit\Framework\TestCase;

final class AnnotationsTest extends TestCase {
    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testRetornaAnnotation() {
        $annotationManager = new Annotations();
        $result = $annotationManager->getByAnnotation('tests\Helpers\TestController', 'Route');
        $this->assertEquals('/test', $result[1]->value);
    }
}