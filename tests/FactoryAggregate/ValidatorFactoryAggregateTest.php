<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\FactoryAggregate;

use PHPUnit\Framework\TestCase;
use WideFocus\Parameters\ParameterBagInterface;
use WideFocus\Validator\FactoryAggregate\ValidatorFactoryAggregate;
use WideFocus\Validator\ValidatorFactoryInterface;
use WideFocus\Validator\ValidatorInterface;

/**
 * @coversDefaultClass \WideFocus\Validator\FactoryAggregate\ValidatorFactoryAggregate
 */
class ValidatorFactoryAggregateTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::addFactory
     * @covers ::create
     */
    public function testCreate()
    {
        $constraints = $this->createMock(ParameterBagInterface::class);

        $validator = $this->createMock(ValidatorInterface::class);
        $factory   = $this->createMock(ValidatorFactoryInterface::class);
        $factory
            ->expects($this->once())
            ->method('create')
            ->with($constraints)
            ->willReturn($validator);

        $factoryAggregate = new ValidatorFactoryAggregate();
        $factoryAggregate->addFactory('foo', $factory);
        $this->assertEquals(
            $validator,
            $factoryAggregate->create('foo', $constraints)
        );
    }

    /**
     * @return void
     *
     * @expectedException \WideFocus\Validator\FactoryAggregate\InvalidValidatorException
     *
     * @covers ::create
     */
    public function testCreateConditionException()
    {
        $constraints = $this->createMock(ParameterBagInterface::class);

        $factoryAggregate = new ValidatorFactoryAggregate();
        $factoryAggregate->create('invalid', $constraints);
    }
}
