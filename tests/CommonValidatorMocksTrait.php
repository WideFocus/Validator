<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests;

use ArrayAccess;
use PHPUnit_Framework_MockObject_MockObject;
use WideFocus\Validator\ValidatorInterface;

trait CommonValidatorMocksTrait
{
    /**
     * @return ArrayAccess|PHPUnit_Framework_MockObject_MockObject
     */
    protected function createArrayAccessMock(): ArrayAccess
    {
        return $this->createMock(ArrayAccess::class);
    }

    /**
     * @return ValidatorInterface|PHPUnit_Framework_MockObject_MockObject
     */
    protected function createValidatorMock(): ValidatorInterface
    {
        return $this->createMock(ValidatorInterface::class);
    }

    /**
     * @param string $originalClassName
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    abstract protected function createMock($originalClassName);  // @codingStandardsIgnoreLine
}