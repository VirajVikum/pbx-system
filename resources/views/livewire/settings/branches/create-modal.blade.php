<div>
    <flux:modal name="create-branch" wire:model="open" class="max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $branchId ? __('Edit Branch') : __('Create Branch') }}</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="name" :label="__('Name')" />
                <flux:input wire:model="code" :label="__('Code')" />
                <flux:input wire:model="company_id" type="number" :label="__('Company ID')" />
                <flux:input wire:model="status" :label="__('Status')" />
            </div>

            <div class="flex justify-end space-x-2">
                <flux:modal.close>
                    <flux:button variant="ghost">{{ __('Cancel') }}</flux:button>
                </flux:modal.close>

                <flux:button wire:click="save" variant="primary">{{ __('Save') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>

