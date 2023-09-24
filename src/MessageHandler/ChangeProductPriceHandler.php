<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Action\ChangeProductPriceAction;
use App\Exception\NotFoundException;
use App\Message\ChangeProductPriceMessage;
use App\Repository\ProductRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class ChangeProductPriceHandler
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly ChangeProductPriceAction $changeProductPriceAction,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function __invoke(ChangeProductPriceMessage $message): void
    {
        $product = $this->productRepository->get($message->productId);
        $this->changeProductPriceAction->execute($product, $message->percentDifference);
    }
}
