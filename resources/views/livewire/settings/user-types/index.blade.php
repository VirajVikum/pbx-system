<div class="space-y-4">
    <flux:button wire:click="$dispatch('createUserType')" icon="plus" variant="primary">
        {{ __('Create User Type') }}
    </flux:button>

    <livewire:tables.user-types-table />
    <livewire:settings.user-types.create-modal />
</div>
