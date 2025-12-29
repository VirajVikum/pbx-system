<div class="space-y-4">
    <button wire:click="$dispatch('createBranch')" class="px-4 py-2 text-white bg-green-600 rounded">
        + Create Branch
    </button>

    <livewire:tables.branch-table />
    <livewire:settings.branches.create-modal />
</div>
