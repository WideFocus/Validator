<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\FactoryAggregate;

use PHPUnit\Framework\TestCase;
use WideFocus\Validator\FactoryAggregate\InvalidValidatorException;

/**
 * @coversDefaultClass \WideFocus\Validator\FactoryAggregate\InvalidValidatorException
 */
class InvalidValidatorExceptionTest extends TestCase
{
    /**
     * @return void
     *
     * @expectedException \WideFocus\Validator\FactoryAggregate\InvalidValidatorException
     * @expectedExceptionMessage A validator for operator foo has not been registered
     *
     * @throws InvalidValidatorException Always.
     *
     * @covers ::__construct
     */
    public function testConstructor()
    {
        throw new InvalidValidatorException('foo');
    }
}
