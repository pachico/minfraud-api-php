<?php

namespace MaxMind\MinFraud\Validation\Rules;

use Respect\Validation\Rules\AbstractWrapper;
use Respect\Validation\Validator as v;

/**
 * @internal
 */
class ShoppingCartItem extends AbstractWrapper
{
    public function __construct()
    {
        $this->validatable = v::arr()
            ->key('category', v::string(), false)
            ->key('item_id', new IntOrString(), false)
            ->key('price', v::float()->min(0), false)
            ->key('quantity', v::int()->min(0), false)
            ->each(
                null,
                v::oneOf(
                    v::equals('category'),
                    v::equals('item_id'),
                    v::equals('price'),
                    v::equals('quantity')
                )
            );
    }
}