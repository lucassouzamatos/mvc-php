<?php

namespace tests;

use Container\DependencyInjection\DependencyInjection;
use PHPUnit\Framework\TestCase;
use tests\Helpers\ServiceOne;

final class DependencyTest extends TestCase {
    /**
     * @throws \Exception
     */
    public function testInstancingClass() {
        $dependencyManager = new DependencyInjection();
        $dependencyManager->setFileServices('core/tests/Helpers/services.json');
        $result = $dependencyManager->builder('tests\Helpers\ServiceOne');

        $this->assertInstanceOf(ServiceOne::class, $result);
    }
}