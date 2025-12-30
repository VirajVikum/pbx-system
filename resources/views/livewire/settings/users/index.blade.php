<div class="space-y-4">
    <div class="flex items-center gap-2">
        <flux:button wire:click="$dispatch('createUser')" icon="plus" variant="primary">
            {{ __('Create User') }}
        </flux:button>
        
        <flux:button wire:click="$dispatch('openAssignExtensionModal')" icon="link" variant="outline">
            {{ __('Assign Extension') }}
        </flux:button>
    </div>

    <livewire:tables.users-table />
    <livewire:settings.users.create-modal />
    <livewire:settings.users.assign-extension-modal />
</div>
