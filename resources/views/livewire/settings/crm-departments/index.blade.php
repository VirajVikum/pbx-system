<div class="space-y-4">
    <flux:button wire:click="$dispatch('createDepartment')" icon="plus" variant="primary">
        {{ __('Create Department') }}
    </flux:button>

    <livewire:tables.crm-departments-table />
    <livewire:settings.crm-departments.create-modal />
</div>
