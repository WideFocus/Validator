<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Validator;

use ArrayAccess;

/**
 * Interface for validators which can use context.
 */
interface ContextAwareValidatorInterface extends ValidatorInterface
{
    /**
     * Set the context to be used during validation.
     *
     * @param ArrayAccess $context
     *
     * @return void
     */
    public function setContext(ArrayAccess $context);
}