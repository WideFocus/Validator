<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Logical;

use WideFocus\Parameters\ParameterBagInterface;
use WideFocus\Validator\ValidatorFactoryInterface;

class LogicalAndValidatorFactory implements ValidatorFactoryInterface
{
    /**
     * Create a validator.
     *
     * @param ParameterBagInterface $constraints
     *
     * @return callable
     */
    public function create(
        ParameterBagInterface $constraints
    ): callable {
        return new LogicalAndValidator(
            new LogicalBoolValidator($constraints->get('value', true))
        );
    }
}
