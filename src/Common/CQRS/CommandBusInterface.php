<?php

declare(strict_types=1);

namespace App\Common\CQRS;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}
