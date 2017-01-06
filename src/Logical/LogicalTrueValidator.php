<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Logical;

use WideFocus\Validator\ValidatorInterface;

class LogicalTrueValidator implements ValidatorInterface
{
    /**
     * Validate a value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function __invoke($value): bool
    {
        if (is_callable($value)) {
            return (bool)call_user_func($value);
        }
        return (bool)$value;
    }
}