<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests;

use ArrayAccess;
use PHPUnit_Framework_TestCase;
use WideFocus\Validator\Tests\TestDouble\ContextAwareValidatorDouble;

/**
 * @coversDefaultClass \WideFocus\Validator\ContextAwareValidatorTrait
 */
class ContextAwareValidatorTraitTest extends PHPUnit_Framework_TestCase
{
    use CommonValidatorMocksTrait;

    /**
     * @param ArrayAccess|null $context
     *
     * @return void
     *
     * @dataProvider contextProvider
     *
     * @covers ::setContext
     * @covers ::hasContext
     * @covers ::getContext
     */
    public function testSetContext(ArrayAccess $context = null)
    {
        $validator = new ContextAwareValidatorDouble();
        if ($context !== null) {
            $validator->setContext($context);
        }
        $this->assertSame($context, $validator->peekContext());
    }

    /**
     * @return array
     */
    public function contextProvider(): array
    {
        return [
            [
                $this->createArrayAccessMock()
            ],
            [
                null
            ]
        ];
    }
}
