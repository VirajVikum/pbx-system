<div class="flex gap-2">
    <button
        wire:click="$dispatch('editCompany', { id: @js($row->id) })"
        class="px-3 py-1 text-sm text-white bg-blue-600 rounded"
    >
        Edit
    </button>

    <button
        wire:click="$dispatch('deleteCompany', { id: @js($row->id) })"
        class="px-3 py-1 text-sm text-white bg-red-600 rounded"
    >
        Delete
    </button>
</div>
