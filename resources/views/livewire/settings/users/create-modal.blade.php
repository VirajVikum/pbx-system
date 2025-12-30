<div>
    <flux:modal name="create-user" wire:model="open" class="max-w-lg">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $userId ? __('Edit User') : __('Create User') }}</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="name" :label="__('Name')" />
                <flux:input wire:model="email" type="email" :label="__('Email')" />
                <flux:input wire:model="phone" :label="__('Phone')" />
                <flux:input wire:model="extension" :label="__('Extension')" />
                <flux:input wire:model="password" type="password" :label="__('Password')" />
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

