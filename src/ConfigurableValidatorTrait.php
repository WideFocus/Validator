<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator;

/**
 * Trait to implement ConfigurableValidatorInterface.
 */
trait ConfigurableValidatorTrait
{
    /**
     * Set the parameters.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setParameters(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $setter = 'set' . $this->snakeToCamelCase($key);
            if (is_callable([$this, $setter])) {
                call_user_func([$this, $setter], $value);
            }
        }
    }

    /**
     * Convert a string to camel case.
     *
     * @param string $value
     *
     * @return string
     */
    protected function snakeToCamelCase(string $value): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $value)));
    }
}
