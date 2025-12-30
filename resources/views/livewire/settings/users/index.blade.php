<div class="p-6 space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl" level="1">{{ __('Users') }}</flux:heading>
            <flux:subheading>{{ __('Manage your system users, their profile details, and assigned extensions.') }}</flux:subheading>
        </div>

        <div class="flex gap-2">
            <flux:button wire:click="$dispatch('createUser')" icon="plus" variant="primary">
                {{ __('Create User') }}
            </flux:button>
            
            <flux:button wire:click="$dispatch('openAssignExtensionModal')" icon="link" variant="outline">
                {{ __('Assign Extension') }}
            </flux:button>
        </div>
    </div>

    <flux:separator variant="subtle" />

    <livewire:tables.users-table />
    <livewire:settings.users.create-modal />
    <livewire:settings.users.assign-extension-modal />
</div>
