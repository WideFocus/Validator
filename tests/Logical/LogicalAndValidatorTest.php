<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\Logical;

use ArrayIterator;
use PHPUnit\Framework\TestCase;
use WideFocus\Validator\Logical\LogicalAndValidator;
use WideFocus\Validator\ValidatorInterface;

/**
 * @coversDefaultClass \WideFocus\Validator\Logical\LogicalAndValidator
 */
class LogicalAndValidatorTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     */
    public function testConstructor()
    {
        $this->assertInstanceOf(
            LogicalAndValidator::class,
            new LogicalAndValidator(
                $this->createMock(ValidatorInterface::class)
            )
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
        $boolValidator = $this->createMock(ValidatorInterface::class);
        $boolValidator->expects($this->exactly($expectedCalls))
            ->method('__invoke')
            ->willReturnArgument(0);

        $validator = new LogicalAndValidator($boolValidator);
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
                3,
                true
            ],
            'array_false' => [
                [true, false, true],
                2,
                false
            ],
            'iterator_true' => [
                new ArrayIterator([true, true, true]),
                3,
                true
            ],
            'iterator_false' => [
                new ArrayIterator([true, false, true]),
                2,
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
