<div class="space-y-4">
    <button wire:click="$dispatch('createUserType')" class="px-4 py-2 text-white bg-green-600 rounded">
        + Create User Type
    </button>

    <livewire:tables.user-types-table />
    <livewire:settings.user-types.create-modal />
</div>
