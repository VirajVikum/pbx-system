<div class="space-y-4">
    <button wire:click="$dispatch('createCompany')" class="px-4 py-2 text-white bg-green-600 rounded">
        + Create Company
    </button>

    <livewire:tables.company-table />
    <livewire:settings.companies.create-modal />
</div>
