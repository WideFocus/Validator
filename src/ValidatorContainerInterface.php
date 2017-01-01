<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator;

use ArrayAccess;

/**
 * Contains a list of validators.
 */
interface ValidatorContainerInterface
{
    /**
     * Whether a validator exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasValidator(string $name): bool;

    /**
     * Get a validator.
     *
     * @param string      $name
     * @param ArrayAccess $context
     *
     * @return callable
     */
    public function getValidator(
        string $name,
        ArrayAccess $context = null
    ): callable;

    /**
     * Add a validator.
     *
     * @param callable $validator
     * @param string   $name
     *
     * @return ValidatorContainerInterface
     */
    public function addValidator(
        callable $validator,
        string $name
    ): ValidatorContainerInterface;
}
