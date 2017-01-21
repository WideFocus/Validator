<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\Logical;

use ArrayIterator;
use WideFocus\Validator\Logical\LogicalOrValidator;
use WideFocus\Validator\ValidatorInterface;

/**
 * @coversDefaultClass \WideFocus\Validator\Logical\LogicalOrValidator
 */
class LogicalOrValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return LogicalOrValidator
     *
     * @covers ::__construct
     */
    public function testConstructor(): LogicalOrValidator
    {
        return new LogicalOrValidator(
            $this->createMock(ValidatorInterface::class)
        );
    }

    /**
     * @param bool|bool[] $value
     * @param int         $expectedCalls
     * @param bool        $expected
     *
     * @return void
     *
     * @dataProvider valueProvider
     *
     * @covers ::__invoke
     * @covers ::validateTraversable
     * @covers ::validateItem
     */
    public function testInvoke($value, int $expectedCalls, bool $expected)
    {
        $trueValidator = $this->createMock(ValidatorInterface::class);
        $trueValidator->expects($this->exactly($expectedCalls))
            ->method('__invoke')
            ->willReturnArgument(0);

        $validator = new LogicalOrValidator($trueValidator);
        $this->assertEquals($expected, call_user_func($validator, $value));
    }

    /**
     * @return array
     */
    public function valueProvider() : array
    {
        return [
            'simple_true' => [
                true,
                1,
                true
            ],
            'simple_false' => [
                false,
                1,
                false
            ],
            'array_true' => [
                [true, true, true],
                1,
                true
            ],
            'array_second_true' => [
                [false, true, false],
                2,
                true
            ],
            'array_false' => [
                [false, false, false],
                3,
                false
            ],
            'iterator_true' => [
                new ArrayIterator([true, true, true]),
                1,
                true
            ],
            'iterator_false' => [
                new ArrayIterator([false, false, false]),
                3,
                false
            ],
            'array_empty' => [
                [],
                0,
                false
            ]
        ];
    }
}
