<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator;

use ArrayAccess;

/**
 * Trait to implement ContextAwareValidatorInterface.
 */
trait ContextAwareValidatorTrait
{
    /**
     * @var ArrayAccess
     */
    private $context;

    /**
     * Set the context to be used during validation.
     *
     * @param ArrayAccess $context
     *
     * @return void
     */
    public function setContext(ArrayAccess $context)
    {
        $this->context = $context;
    }

    /**
     * Get the context to be used during validation.
     *
     * @return ArrayAccess
     */
    protected function getContext(): ArrayAccess
    {
        return $this->context;
    }
}
