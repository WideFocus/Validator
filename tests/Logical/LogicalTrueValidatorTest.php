<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\Logical;

use PHPUnit_Framework_TestCase;
use WideFocus\Validator\Logical\LogicalTrueValidator;

/**
 * @coversDefaultClass \WideFocus\Validator\Logical\LogicalTrueValidator
 */
class LogicalTrueValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param mixed $value
     * @param bool  $expected
     *
     * @return void
     *
     * @dataProvider valueProvider
     *
     * @covers ::__invoke
     */
    public function testInvoke($value, bool $expected)
    {
        $validator = new LogicalTrueValidator();
        $this->assertEquals($expected, call_user_func($validator, $value));
    }

    /**
     * @return array
     */
    public function valueProvider(): array
    {
        return [
            'simple_true' => [
                true,
                true
            ],
            'simple_false' => [
                false,
                false
            ],
            'callback_true' => [
                function () : bool {
                    return true;
                },
                true
            ],
            'callback_false' => [
                function () : bool {
                    return false;
                },
                false
            ],
            'evaluate_true' => [
                'some_text',
                true
            ],
            'evaluate_false' => [
                '',
                false
            ]
        ];
    }
}
