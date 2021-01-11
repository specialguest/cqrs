<?php

declare(strict_types=1);

namespace App\Common\CQRS;

interface QueryBusInterface
{
    public function handle(QueryInterface $query): mixed;
}
