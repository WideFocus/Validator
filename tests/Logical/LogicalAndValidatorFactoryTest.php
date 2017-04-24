<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\Logical;

use PHPUnit\Framework\TestCase;
use WideFocus\Parameters\ParameterBagInterface;
use WideFocus\Validator\Logical\LogicalAndValidator;
use WideFocus\Validator\Logical\LogicalAndValidatorFactory;

/**
 * @coversDefaultClass \WideFocus\Validator\Logical\LogicalAndValidatorFactory
 */
class LogicalAndValidatorFactoryTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::create
     */
    public function testCreate()
    {
        $constraints = $this->createMock(ParameterBagInterface::class);
        $constraints
            ->expects($this->once())
            ->method('get')
            ->with('value')
            ->willReturn(true);

        $factory = new LogicalAndValidatorFactory();
        $this->assertInstanceOf(
            LogicalAndValidator::class,
            $factory->create($constraints)
        );
    }
}