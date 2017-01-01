<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator;

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
     * @param string $name
     *
     * @return callable
     */
    public function getValidator(string $name): callable;

    /**
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
