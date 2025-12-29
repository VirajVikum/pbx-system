<div class="space-y-4">
    <button wire:click="$dispatch('createDepartment')" class="px-4 py-2 text-white bg-green-600 rounded">
        + Create Department
    </button>

    <livewire:tables.crm-departments-table />
    <livewire:settings.crm-departments.create-modal />
</div>
