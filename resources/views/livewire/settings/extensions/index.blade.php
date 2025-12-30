<div class="space-y-4">
    <flux:button wire:click="$dispatch('createExtension')" icon="plus" variant="primary">
        {{ __('Create Extension') }}
    </flux:button>

    <livewire:tables.extensions-table />
    <livewire:settings.extensions.create-modal />
</div>
