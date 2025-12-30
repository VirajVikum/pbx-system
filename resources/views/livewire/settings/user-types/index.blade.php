<div class="p-6 space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl" level="1">{{ __('User Types') }}</flux:heading>
            <flux:subheading>{{ __('Define roles and permission levels for different user categories.') }}</flux:subheading>
        </div>

        <flux:button wire:click="$dispatch('createUserType')" icon="plus" variant="primary">
            {{ __('Create User Type') }}
        </flux:button>
    </div>

    <flux:separator variant="subtle" />

    <livewire:tables.user-types-table />
    <livewire:settings.user-types.create-modal />
</div>
