<div>
    <flux:modal name="create-extension" wire:model="open" class="max-w-lg">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $extensionId ? __('Edit Extension') : __('Create Extension') }}</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="extension" :label="__('Extension')" />
                <flux:input wire:model="password" type="password" :label="__('Password')" />
                <flux:input wire:model="context" :label="__('Context')" />
                <flux:input wire:model="phone_type" :label="__('Phone Type')" />
                <flux:input wire:model="department" :label="__('Department')" />
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

