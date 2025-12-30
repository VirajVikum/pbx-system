<div class="space-y-4">
    <flux:button wire:click="$dispatch('createUser')" icon="plus" variant="primary">
        {{ __('Create User') }}
    </flux:button>

    <livewire:tables.users-table />
    <livewire:settings.users.create-modal />
</div>
