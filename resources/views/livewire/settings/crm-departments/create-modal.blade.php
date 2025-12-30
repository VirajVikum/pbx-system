<div>
    <flux:modal name="create-department" wire:model="open" class="max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $departmentId ? __('Edit Department') : __('Create Department') }}</flux:heading>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <flux:input wire:model="name" :label="__('Name')" required />
                <flux:select wire:model="branch_id" :label="__('Branch')" required>
                    <flux:select.option value="">{{ __('Select Branch') }}</flux:select.option>
                    @foreach($branches as $branch)
                        <flux:select.option value="{{ $branch->id }}">{{ $branch->name }}</flux:select.option>
                    @endforeach
                </flux:select>
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

