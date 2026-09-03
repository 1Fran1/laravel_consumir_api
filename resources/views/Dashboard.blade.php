<x-app-layout>
    <div class="min-h-screen bg-gray-100">

        {{-- Header --}}
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="flex items-center justify-between">

                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">
                            Dashboard
                        </h1>

                        <p class="mt-1 text-sm text-gray-500">
                            Información general de tu aplicación
                        </p>
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ now()->format('d/m/Y') }}
                    </div>

                </div>
            </div>
        </div>


        {{-- Content --}}
        <main class="max-w-7xl mx-auto px-6 py-8">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Card 1 --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Registros
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900">
                                {{ $totalRecords ?? 0 }}
                            </p>
                        </div>

                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                            </svg>
                        </div>

                    </div>

                </div>


                {{-- Card 2 --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Completados
                            </p>

                            <p class="mt-2 text-3xl font-bold text-green-600">
                                {{ $completedTasks ?? 0 }}
                            </p>
                        </div>

                        <div class="bg-green-100 p-3 rounded-lg">

                            <svg class="w-6 h-6 text-green-600"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Card 3 --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Pendientes
                            </p>

                            <p class="mt-2 text-3xl font-bold text-yellow-600">
                                {{ $pendingTasks ?? 0 }}
                            </p>
                        </div>

                        <div class="bg-yellow-100 p-3 rounded-lg">

                            <svg class="w-6 h-6 text-yellow-600"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Card 4 --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Estado API
                            </p>

                            <p class="mt-2 text-lg font-bold
                                {{ ($apiStatus ?? false)
                                    ? 'text-green-600'
                                    : 'text-red-600' }}">

                                {{ ($apiStatus ?? false)
                                    ? 'Conectada'
                                    : 'Sin conexión' }}

                            </p>
                        </div>

                        <div class="
                            {{ ($apiStatus ?? false)
                                ? 'bg-green-100'
                                : 'bg-red-100' }}
                            p-3 rounded-lg
                        ">

                            <span class="
                                block w-3 h-3 rounded-full
                                {{ ($apiStatus ?? false)
                                    ? 'bg-green-500'
                                    : 'bg-red-500' }}
                            "></span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- API Data --}}
            <div class="mt-8">

                <div class="bg-white rounded-xl shadow-sm border border-gray-200">

                    <div class="px-6 py-5 border-b border-gray-200">

                        <div class="flex items-center justify-between">

                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">
                                    Datos de la API
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Información obtenida desde el servicio externo
                                </p>
                            </div>

                            <span class="text-xs font-medium px-3 py-1 rounded-full
                                {{ ($apiStatus ?? false)
                                    ? 'bg-green-100 text-green-700'
                                    : 'bg-red-100 text-red-700' }}">

                                {{ ($apiStatus ?? false)
                                    ? 'ONLINE'
                                    : 'OFFLINE' }}

                            </span>

                        </div>

                    </div>


                    {{-- Table --}}

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm text-left">

                            <thead class="bg-gray-50 text-gray-600">

                                <tr>

                                    <th class="px-6 py-4 font-semibold">
                                        ID
                                    </th>

                                    <th class="px-6 py-4 font-semibold">
                                        Nombre
                                    </th>

                                    <th class="px-6 py-4 font-semibold">
                                        Descripción
                                    </th>

                                    <th class="px-6 py-4 font-semibold">
                                        Estado
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @forelse ($apiData ?? [] as $item)

                                    <tr class="hover:bg-gray-50">

                                        <td class="px-6 py-4 text-gray-700">
                                            {{ $item['id'] ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ $item['name'] ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4 text-gray-500">
                                            {{ $item['description'] ?? 'Sin descripción' }}
                                        </td>

                                        <td class="px-6 py-4">

                                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                                Activo
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="px-6 py-10 text-center text-gray-500">

                                            No hay información disponible.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            {{-- TODO --}}
            <div class="mt-8">

                <div class="bg-white rounded-xl shadow-sm border border-gray-200">

                    <div class="px-6 py-5 border-b border-gray-200">

                        <div class="flex justify-between items-center">

                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">
                                    Mis tareas
                                </h2>

                                <p class="text-sm text-gray-500">
                                    Lista de tareas pendientes
                                </p>
                            </div>

                            <a href="#"
                               class="px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition">

                                Nueva tarea

                            </a>

                        </div>

                    </div>


                    <div class="divide-y divide-gray-200">

                        @forelse ($tasks ?? [] as $task)

                            <div class="px-6 py-4 flex items-center justify-between">

                                <div class="flex items-center gap-3">

                                    <input type="checkbox"
                                           class="w-4 h-4 rounded border-gray-300">

                                    <span class="text-gray-800">
                                        {{ $task->title }}
                                    </span>

                                </div>

                                <span class="text-xs text-gray-500">
                                    {{ $task->created_at?->format('d/m/Y') }}
                                </span>

                            </div>

                        @empty

                            <div class="px-6 py-8 text-center text-gray-500">

                                No tienes tareas todavía.

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </main>

    </div>
</x-app-layout>