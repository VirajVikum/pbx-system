<div>
    <flux:modal name="create-extension" wire:model="open" class="max-w-lg">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $extensionId ? __('Edit Extension') : __('Create Extension') }}</flux:heading>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <flux:input wire:model="extension" :label="__('Extension')" required />
                <flux:select wire:model="exten_type" :label="__('Exten Type')">
                    <flux:select.option value="">{{ __('Select Type') }}</flux:select.option>
                    <flux:select.option value="sip">sip</flux:select.option>
                    <flux:select.option value="iax2">iax2</flux:select.option>
                    <flux:select.option value="pjsip">pjsip</flux:select.option>
                </flux:select>
                <flux:input wire:model="password" type="password" :label="__('Password')" required viewable />
                
                <flux:select wire:model.live="context" :label="__('Company')" required>
                    <flux:select.option value="">{{ __('Select Company') }}</flux:select.option>
                    @foreach($companies as $company)
                        <flux:select.option value="{{ $company->name }}">{{ $company->name }}</flux:select.option>
                    @endforeach
                </flux:select>

                <flux:select wire:model.live="branch" :label="__('Branch')" :disabled="!$context">
                    <flux:select.option value="">{{ __('Select Branch') }}</flux:select.option>
                    @foreach($branchesList as $b)
                        <flux:select.option value="{{ $b->name }}">{{ $b->name }}</flux:select.option>
                    @endforeach
                </flux:select>

                <flux:select wire:model="department" :label="__('Department')" :disabled="!$branch">
                    <flux:select.option value="">{{ __('Select Department') }}</flux:select.option>
                    @foreach($departmentsList as $d)
                        <flux:select.option value="{{ $d->name }}">{{ $d->name }}</flux:select.option>
                    @endforeach
                </flux:select>

                <flux:select wire:model="phone_type" :label="__('Phone Type')">
                    <flux:select.option value="">{{ __('Select Type') }}</flux:select.option>
                    <flux:select.option value="mobile">mobile</flux:select.option>
                    <flux:select.option value="desk">desk</flux:select.option>
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

