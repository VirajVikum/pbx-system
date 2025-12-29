<div class="space-y-4">
    <button
        wire:click="$dispatch('createUser')"
        class="px-4 py-2 text-white bg-green-600 rounded"
    >
        + Create User
    </button>

    <livewire:tables.users-table />
    <livewire:settings.users.create-modal />
</div>
