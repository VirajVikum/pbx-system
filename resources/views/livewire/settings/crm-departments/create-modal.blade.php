<div>
    <flux:modal name="create-department" wire:model="open" class="max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $departmentId ? __('Edit Department') : __('Create Department') }}</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="name" :label="__('Name')" />
                <flux:input wire:model="branch_id" type="number" :label="__('Branch ID')" />
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

