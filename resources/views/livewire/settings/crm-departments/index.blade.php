<div class="p-6 space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl" level="1">{{ __('Departments') }}</flux:heading>
            <flux:subheading>{{ __('Manage functional departments within your organization.') }}</flux:subheading>
        </div>

        <flux:button wire:click="$dispatch('createDepartment')" icon="plus" variant="primary">
            {{ __('Create Department') }}
        </flux:button>
    </div>

    <flux:separator variant="subtle" />

    <livewire:tables.crm-departments-table />
    <livewire:settings.crm-departments.create-modal />
</div>
