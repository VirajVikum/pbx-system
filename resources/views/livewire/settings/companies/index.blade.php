<div class="space-y-4">
    <flux:button wire:click="$dispatch('createCompany')" icon="plus" variant="primary">
        {{ __('Create Company') }}
    </flux:button>

    <livewire:tables.company-table />
    <livewire:settings.companies.create-modal />
</div>
