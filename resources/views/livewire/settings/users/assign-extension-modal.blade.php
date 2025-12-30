<div>
    <flux:modal name="assign-extension" wire:model="open" class="max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Assign Extension') }}</flux:heading>
                <flux:subheading>{{ __('Assign an available extension to a user who doesn\'t have one.') }}</flux:subheading>
            </div>

            <form wire:submit="assign" class="space-y-6">
                <div>
                    <flux:select wire:model="selectedUserId" :label="__('User')" required>
                        <flux:select.option value="">{{ __('Select User') }}</flux:select.option>
                        @foreach($users as $user)
                            <flux:select.option value="{{ $user->id }}">{{ $user->name }} ({{ $user->user_name }})</flux:select.option>
                        @endforeach
                    </flux:select>
                    @error('selectedUserId') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <flux:select wire:model="selectedExtension" :label="__('Extension')" required>
                        <flux:select.option value="">{{ __('Select Extension') }}</flux:select.option>
                        @foreach($extensions as $ext)
                            <flux:select.option value="{{ $ext->extension }}">{{ $ext->extension }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    @error('selectedExtension') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <flux:modal.close>
                        <flux:button variant="ghost">{{ __('Cancel') }}</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="primary">{{ __('Assign') }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
