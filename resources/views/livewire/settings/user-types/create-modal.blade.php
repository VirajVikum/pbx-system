<div>
    <flux:modal name="create-user-type" wire:model="open" class="max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $userTypeId ? __('Edit User Type') : __('Create User Type') }}</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:input wire:model="title" :label="__('Title')" />
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

