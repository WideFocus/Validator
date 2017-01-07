<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Tests\TestDouble;

use WideFocus\Validator\ConfigurableValidatorInterface;
use WideFocus\Validator\ConfigurableValidatorTrait;

class ConfigurableValidatorDouble implements ConfigurableValidatorInterface
{
    use ConfigurableValidatorTrait;

    /**
     * @var mixed
     */
    private $someParameter;

    /**
     * @var mixed
     */
    private $someOtherParameter;

    /**
     * Validate a value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function __invoke($value): bool
    {
        return true;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function setSomeParameter($value)
    {
        $this->someParameter = $value;
    }

    /**
     * @return mixed
     */
    public function getSomeParameter()
    {
        return $this->someParameter;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function setSomeOtherParameter($value)
    {
        $this->someOtherParameter = $value;
    }

    /**
     * @return mixed
     */
    public function getSomeOtherParameter()
    {
        return $this->someOtherParameter;
    }
}
