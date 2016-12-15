<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator;

use ArrayAccess;

interface ValidatorInterface
{
    /**
     * Validate a value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool;

    /**
     * Set the parameters.
     *
     * @param array $parameters
     *
     * @return ValidatorInterface
     */
    public function setParameters(array $parameters): ValidatorInterface;

    /**
     * Set the context to be used during validation.
     *
     * @param ArrayAccess $context
     *
     * @return ValidatorInterface
     */
    public function setContext(ArrayAccess $context): ValidatorInterface;
}
