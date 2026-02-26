<x-app-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <a href="{{ route('properties.index') }}"
               class="text-sm font-medium text-gray-600 hover:text-gray-900">
                 Retour aux biens
            </a>

            <div class="text-sm text-gray-500">
                #{{ $property->id }}
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
            <div class="p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div class="min-w-0">
                        <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900">
                            {{ $property->name }}
                        </h1>

                        <p class="text-gray-700 mt-4 leading-relaxed">
                            {{ $property->description }}
                        </p>
                    </div>

                    <div class="shrink-0">
                        <div class="rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-right">
                            <div class="text-xs text-gray-500">Prix</div>
                            <div class="text-2xl font-extrabold text-gray-900">
                                {{ number_format($property->price_per_night, 0, ',', ' ') }} €
                            </div>
                            <div class="text-xs text-gray-500">par nuit</div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap items-center gap-2 text-xs text-gray-600">
                    <span class="px-3 py-1 rounded-full bg-gray-100 border border-gray-200">Annulation flexible</span>
                    <span class="px-3 py-1 rounded-full bg-gray-100 border border-gray-200">Paiement sur place</span>
                    <span class="px-3 py-1 rounded-full bg-gray-100 border border-gray-200">Support 7j/7</span>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900">Réservation</h2>
            <p class="text-sm text-gray-600 mt-1">
                Choisissez vos dates. Les périodes déjà réservées sont automatiquement refusées.
            </p>

            <div class="mt-5">
                @auth
                    <livewire:booking-manager :property="$property" />
                @else
                    <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">
                        <div class="text-sm text-gray-700">
                            Veuillez <a class="font-semibold underline" href="{{ route('login') }}">vous connecter</a> pour réserver.
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>