<?php

namespace App\Http\Controllers;

use App\Services\ExternalApiService;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private ExternalApiService $apiService
    ) {}

    public function index(): View
    {
        $products = [];
        $error = null;

        try {
            $products = $this->apiService->getProducts();
        } catch (\Throwable $e) {
            $error = 'No se pudieron cargar los productos.';
        }

        return view('products.index', compact('products', 'error'));
    }
}