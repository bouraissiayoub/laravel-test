<div class="mt-4">
    @if (session('success'))
        <div class="mb-3 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg px-3 py-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Date début</label>
            <input type="date" wire:model="start_date" class="mt-1 w-full rounded-lg border-gray-300">
            @error('start_date') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Date fin</label>
            <input type="date" wire:model="end_date" class="mt-1 w-full rounded-lg border-gray-300">
            @error('end_date') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>
    </div>

    <button type="button"
            wire:click="reserve"
            class="mt-4 inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-2 text-sm font-semibold text-white hover:bg-gray-800">
        Réserver
    </button>

    <div class="mt-6">
        <h3 class="text-sm font-semibold text-gray-900 mb-2">Dernières réservations</h3>

        <div class="space-y-2 text-sm text-gray-700">
            @forelse($dernieres as $b)
                <div class="rounded-lg border border-gray-200 bg-gray-50 px-3 py-2">
                    {{ $b->start_date->format('d/m/Y') }} → {{ $b->end_date->format('d/m/Y') }}
                </div>
            @empty
                <div class="text-gray-500">Aucune réservation pour le moment.</div>
            @endforelse
        </div>
    </div>

    
    <script>
        window.addEventListener('booking-created', () => {
            console.log('Réservation créée (Livewire dispatchBrowserEvent)');
        });
    </script>
</div>