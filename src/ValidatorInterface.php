<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator;

/**
 * Interface for validators.
 */
interface ValidatorInterface
{
    /**
     * Validate a value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function __invoke($value): bool;
}
