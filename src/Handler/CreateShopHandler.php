<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\CreateShopCommand;
use App\Common\CQRS\CommandInterface;
use App\Common\CQRS\CommandHandlerInterface;
use App\Factory\ShopFactory;
use App\Repository\ShopRepository;

final class CreateShopHandler implements CommandHandlerInterface
{
    private ShopFactory $shopFactory;
    private ShopRepository $shopRepository;

    public function __construct(ShopFactory $shopFactory, ShopRepository $shopRepository)
    {
        $this->shopFactory = $shopFactory;
        $this->shopRepository = $shopRepository;
    }

    public function __invoke(CreateShopCommand $command): void
    {
        // if ($this->shops->existsWithName($command->name())) {
        //    throw ShopNameTaken::withName($command->name());
        // }

        $shop = $this->shopFactory->create($command->id(), $command->name());

        $this->shopRepository->add($shop);
    }
}
