<div class="space-y-4">
    <flux:button wire:click="$dispatch('createBranch')" icon="plus" variant="primary">
        {{ __('Create Branch') }}
    </flux:button>

    <livewire:tables.branch-table />
    <livewire:settings.branches.create-modal />
</div>
