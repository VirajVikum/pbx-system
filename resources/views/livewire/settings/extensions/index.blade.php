<div class="space-y-4">
    <button
        wire:click="$dispatch('createExtension')"
        class="px-4 py-2 text-white bg-green-600 rounded"
    >
        + Create Extension
    </button>

    <livewire:tables.extensions-table />
    <livewire:settings.extensions.create-modal />
</div>
