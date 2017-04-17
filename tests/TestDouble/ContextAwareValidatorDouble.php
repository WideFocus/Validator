<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
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
     * @param mixed $input
     *
     * @return bool
     */
    public function __invoke($input): bool
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
