<?php

namespace App\Exceptions;

use Exception;

class BasketNotFoundException extends Exception implements \Throwable
{
    public function __toString()
    {
        return "Basket not found in database";
    }
}
