<div class="p-6 space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl" level="1">{{ __('Branches') }}</flux:heading>
            <flux:subheading>{{ __('Manage company branches and their office locations.') }}</flux:subheading>
        </div>

        <flux:button wire:click="$dispatch('createBranch')" icon="plus" variant="primary">
            {{ __('Create Branch') }}
        </flux:button>
    </div>

    <flux:separator variant="subtle" />

    <livewire:tables.branch-table />
    <livewire:settings.branches.create-modal />
</div>
