<div>
    <div class="mb-3">
        <div class="row">
            <!-- Première colonne pour le champ de recherche par mots-clés -->
            <div class="col">
                <input class="form-control me-2" type="search" wire:model.debounce.500ms="search"
                    placeholder="Rechercher par mots-clés" aria-label="Search">
            </div>
        </div>
    </div>

    @foreach ($activity as $data)
        @livewire('activite-item', ['data' => $data])
    @endforeach
</div>
