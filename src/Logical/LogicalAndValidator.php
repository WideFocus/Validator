<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
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
    private $boolValidator;

    /**
     * Constructor.
     *
     * @param callable $boolValidator
     */
    public function __construct(callable $boolValidator)
    {
        $this->boolValidator = $boolValidator;
    }

    /**
     * Validate a value.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function __invoke($input): bool
    {
        return is_array($input) || $input instanceof Traversable
            ? $this->validateTraversable($input)
            : $this->validateItem($input);
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
            $this->boolValidator,
            $item
        );
    }
}
