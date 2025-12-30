<div>
    <flux:modal name="create-company" wire:model="open" class="max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $companyId ? __('Edit Company') : __('Create Company') }}</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="name" :label="__('Name')" />
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

