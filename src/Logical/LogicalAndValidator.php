<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Validator\Logical;

use Traversable;
use WideFocus\Validator\ValidatorInterface;

/**
 * Validates whether all items evaluate to true
 */
class LogicalAndValidator implements ValidatorInterface
{
    /**
     * @var callable
     */
    private $logicalTrueValidator;

    /**
     * Constructor.
     *
     * @param callable $logicalTrueValidator
     */
    public function __construct(callable $logicalTrueValidator)
    {
        $this->logicalTrueValidator = $logicalTrueValidator;
    }

    /**
     * Validate a value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function __invoke($value): bool
    {
        return is_array($value) || $value instanceof Traversable
            ? $this->validateTraversable($value)
            : $this->validateItem($value);
    }

    /**
     * Validates a traversable value.
     *
     * @param array|Traversable $value
     *
     * @return bool
     */
    protected function validateTraversable($value): bool
    {
        $hasItems = false;
        foreach ($value as $item) {
            if (!$this->validateItem($item)) {
                return false;
            }
            $hasItems = true;
        }
        return $hasItems;
    }

    /**
     * Validates an item.
     *
     * @param mixed $item
     *
     * @return bool
     */
    protected function validateItem($item): bool
    {
        return call_user_func(
            $this->logicalTrueValidator,
            $item
        );
    }
}
