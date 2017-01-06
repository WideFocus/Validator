<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests;

use ArrayAccess;
use PHPUnit_Framework_MockObject_MockObject;

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
     * @param string $originalClassName
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    abstract protected function createMock($originalClassName);  // @codingStandardsIgnoreLine
}