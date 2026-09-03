<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;

class ExternalApiService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {}

    public function getProducts(): array
    {
        return $this->productRepository->getProducts();
    }
}
