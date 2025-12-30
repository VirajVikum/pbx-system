<div class="p-6 space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl" level="1">{{ __('Extensions') }}</flux:heading>
            <flux:subheading>{{ __('Configure PBX extensions, phone types, and technical contexts.') }}</flux:subheading>
        </div>

        <flux:button wire:click="$dispatch('createExtension')" icon="plus" variant="primary">
            {{ __('Create Extension') }}
        </flux:button>
    </div>

    <flux:separator variant="subtle" />

    <livewire:tables.extensions-table />
    <livewire:settings.extensions.create-modal />
</div>
