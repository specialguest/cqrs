<?php

namespace App\Factory;

use App\Entity\Shop;
use App\Factory;

class ShopFactory
{
    public function create(string $commandId, string $commandName): Shop
    {
        return new Shop();
    }
}
