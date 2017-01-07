<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\TestDouble;

use ArrayAccess;
use WideFocus\Validator\ContextAwareValidatorInterface;
use WideFocus\Validator\ContextAwareValidatorTrait;

class ContextAwareValidatorDouble implements ContextAwareValidatorInterface
{
    use ContextAwareValidatorTrait;

    /**
     * Validate a value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function __invoke($value): bool
    {
        return true;
    }

    /**
     * @return ArrayAccess|null
     */
    public function peekContext()
    {
        if ($this->hasContext()) {
            return $this->getContext();
        }
        return null;
    }
}
