<x-app-layout>
    <div class="space-y-6">
        <div class="flex items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight">Biens disponibles</h1>
                <p class="text-sm text-gray-600 mt-1">
                    Consultez les logements et réservez en quelques clics.
                </p>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($properties as $property)
                <div class="rounded-2xl border border-gray-200 bg-white shadow-sm hover:shadow-md transition overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0">
                                <h2 class="font-semibold text-lg text-gray-900 truncate">
                                    {{ $property->name }}
                                </h2>
                                <p class="text-sm text-gray-600 mt-2 line-clamp-3">
                                    {{ $property->description }}
                                </p>
                            </div>

                            <div class="shrink-0 text-right">
                                <div class="text-sm text-gray-500">À partir de</div>
                                <div class="text-lg font-bold text-gray-900">
                                    {{ number_format($property->price_per_night, 0, ',', ' ') }} €
                                </div>
                                <div class="text-xs text-gray-500">/ nuit</div>
                            </div>
                        </div>

                        <div class="mt-5 flex items-center justify-between">
                            <div class="text-xs text-gray-500">
                                Réservation en ligne
                            </div>

                            <a href="{{ route('properties.show', $property) }}"
                               class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-gray-900 hover:bg-gray-800 px-4 py-2 rounded-lg">
                                Voir le bien
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-2">
            {{ $properties->links() }}
        </div>
    </div>
</x-app-layout>