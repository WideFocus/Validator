<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
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
     * @param mixed $input
     *
     * @return bool
     */
    public function __invoke($input): bool;
}
