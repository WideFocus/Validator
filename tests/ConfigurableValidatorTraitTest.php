<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests;

use PHPUnit_Framework_TestCase;
use WideFocus\Validator\Tests\TestDouble\ConfigurableValidatorDouble;

/**
 * @coversDefaultClass \WideFocus\Validator\ConfigurableValidatorTrait
 */
class ConfigurableValidatorTraitTest extends PHPUnit_Framework_TestCase
{
    use CommonValidatorMocksTrait;

    /**
     * @param array $parameters
     * @param array $expected
     *
     * @return void
     *
     * @dataProvider parametersProvider
     *
     * @covers ::setParameters
     * @covers ::snakeToCamelCase
     */
    public function testSetParameters(array $parameters, array $expected)
    {
        $validator = new ConfigurableValidatorDouble();
        $validator->setParameters($parameters);

        foreach ($expected as $method => $value) {
            $this->assertEquals($value, call_user_func([$validator, $method]));
        }
    }

    /**
     * @return array
     */
    public function parametersProvider(): array
    {
        return [
            'snake_cased' => [
                [
                    'some_parameter' => 'foo',
                    'some_unknown_parameter' => 'quu'
                ],
                [
                    'getSomeParameter' => 'foo',
                    'getSomeOtherParameter' => null
                ]
            ],
            'camel_cased' => [
                [
                    'someParameter' => 'foo',
                    'someUnknownParameter' => 'quu'
                ],
                [
                    'getSomeParameter' => 'foo',
                    'getSomeOtherParameter' => null
                ]
            ],
            'overwrite' => [
                [
                    'someParameter' => 'foo',
                    'some_parameter' => 'bar'
                ],
                [
                    'getSomeParameter' => 'bar'
                ]
            ]
        ];
    }
}
