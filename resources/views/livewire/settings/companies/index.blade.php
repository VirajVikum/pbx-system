<div class="p-6 space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl" level="1">{{ __('Companies') }}</flux:heading>
            <flux:subheading>{{ __('Configure company profiles and organizational settings.') }}</flux:subheading>
        </div>

        <flux:button wire:click="$dispatch('createCompany')" icon="plus" variant="primary">
            {{ __('Create Company') }}
        </flux:button>
    </div>

    <flux:separator variant="subtle" />

    <livewire:tables.company-table />
    <livewire:settings.companies.create-modal />
</div>
