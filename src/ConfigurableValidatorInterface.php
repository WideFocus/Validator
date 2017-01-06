<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator;

/**
 * Interface for validators that can be configured.
 */
interface ConfigurableValidatorInterface extends ValidatorInterface
{
    /**
     * Set the parameters.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setParameters(array $parameters);
}