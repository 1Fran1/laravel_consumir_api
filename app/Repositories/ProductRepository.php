<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Http;

class ProductRepository implements ProductRepositoryInterface
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim(
            config('services.external_api.url', 'https://dummyjson.com'),
            '/',
        );
    }

    public function getProducts(): array
    {
        return Http::acceptJson()
            ->timeout(10)
            ->get($this->baseUrl.'/products')
            ->throw()
            ->json('products', []);
    }
}
