<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\Logical;

use PHPUnit\Framework\TestCase;
use WideFocus\Validator\Logical\LogicalBoolValidator;

/**
 * @coversDefaultClass \WideFocus\Validator\Logical\LogicalBoolValidator
 */
class LogicalBoolValidatorTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     */
    public function testConstructor()
    {
        $this->assertInstanceOf(
            LogicalBoolValidator::class,
            new LogicalBoolValidator(true)
        );
    }

    /**
     * @param bool  $value
     * @param mixed $input
     * @param bool  $expected
     *
     * @return void
     * @dataProvider valueProvider
     *
     * @covers ::__invoke
     */
    public function testInvoke(bool $value, $input, bool $expected)
    {
        $validator = new LogicalBoolValidator($value);
        $this->assertEquals($expected, call_user_func($validator, $input));
    }

    /**
     * @return array
     */
    public function valueProvider(): array
    {
        return [
            'simple_true' => [
                true,
                true,
                true
            ],
            'inversed_true' => [
                false,
                false,
                true
            ],
            'simple_false' => [
                true,
                false,
                false
            ],
            'callback_true' => [
                true,
                function () : bool {
                    return true;
                },
                true
            ],
            'callback_false' => [
                true,
                function () : bool {
                    return false;
                },
                false
            ],
            'evaluate_true' => [
                true,
                'some_text',
                true
            ],
            'evaluate_false' => [
                true,
                '',
                false
            ]
        ];
    }
}
