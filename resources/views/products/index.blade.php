<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Productos | {{ config('app.name', 'Laravel') }}</title>
		@vite('resources/css/app.css')
	</head>
	<body class="min-h-screen bg-slate-100 text-slate-900">
		<main class="mx-auto max-w-7xl px-6 py-10 lg:px-8">
			<div class="mb-10 flex flex-col gap-6 border-b border-slate-200 pb-8 sm:flex-row sm:items-end sm:justify-between">
				<div>
					<p class="text-sm font-semibold uppercase tracking-wider text-indigo-600">Catálogo de productos</p>
					<h1 class="mt-2 text-4xl font-bold tracking-tight text-slate-950">Todo lo que necesitas</h1>
					<p class="mt-3 max-w-xl text-slate-600">Consulta el catálogo actualizado y encuentra rápidamente el producto adecuado.</p>
				</div>
				<div class="flex items-center gap-4">
					<div class="rounded-lg border border-slate-200 bg-white px-4 py-3 text-right shadow-sm">
						<p class="text-xs font-medium uppercase tracking-wide text-slate-500">Disponibles</p>
						<p class="mt-1 text-2xl font-bold text-slate-950">{{ count($products) }}</p>
					</div>
					<a href="{{ route('home') }}" class="inline-flex w-fit items-center rounded-lg bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Inicio</a>
				</div>
			</div>

			@if ($error)
				<div class="mb-8 flex items-center justify-between gap-4 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800" role="alert">
					{{ $error }}
					<a href="{{ route('products.index') }}" class="shrink-0 font-semibold underline underline-offset-2">Reintentar</a>
				</div>
			@endif

			@if (count($products) > 0)
				<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
					@foreach ($products as $product)
						<article class="group overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
							@if (!empty($product['thumbnail']))
								<img src="{{ $product['thumbnail'] }}" alt="{{ $product['title'] ?? 'Producto' }}" loading="lazy" class="h-52 w-full object-cover transition duration-300 group-hover:scale-105">
							@else
								<div class="flex h-48 items-center justify-center bg-slate-200 text-sm text-slate-500">Sin imagen</div>
							@endif
							<div class="p-5">
								<div class="flex items-start justify-between gap-3">
									<h2 class="font-semibold text-slate-900">{{ $product['title'] ?? 'Producto sin nombre' }}</h2>
									@if (isset($product['rating']))
										<span class="shrink-0 text-sm text-amber-600">★ {{ number_format((float) $product['rating'], 1) }}</span>
									@endif
								</div>
								<p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $product['description'] ?? 'Sin descripción disponible.' }}</p>
								<div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
									<p class="text-xl font-bold text-indigo-600">${{ number_format((float) ($product['price'] ?? 0), 2) }}</p>
									@if (isset($product['discountPercentage']))
										<span class="text-xs font-semibold text-emerald-600">-{{ number_format((float) $product['discountPercentage'], 0) }}%</span>
									@endif
								</div>
							</div>
						</article>
					@endforeach
				</div>
			@else
				<div class="rounded-xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
					<h2 class="text-lg font-semibold">No hay productos para mostrar</h2>
					<p class="mt-2 text-sm text-slate-600">Revisa la conexión con la API e inténtalo de nuevo.</p>
				</div>
			@endif
		</main>
	</body>
</html>
