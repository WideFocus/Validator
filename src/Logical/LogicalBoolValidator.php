<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Validator\Logical;

use WideFocus\Validator\ValidatorInterface;

/**
 * Validates whether a value evaluates to true.
 */
class LogicalBoolValidator implements ValidatorInterface
{
    /**
     * @var bool
     */
    private $value;

    /**
     * Constructor.
     *
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    /**
     * Validate a value.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function __invoke($input): bool
    {
        if (is_callable($input)) {
            return call_user_func($input) == $this->value;
        }
        return $input == $this->value;
    }
}
