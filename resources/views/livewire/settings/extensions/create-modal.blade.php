<div>
    @if($open)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="w-full max-w-lg p-6 bg-white rounded-lg">

                <h2 class="mb-4 text-lg font-semibold">
                    {{ $extensionId ? 'Edit Extension' : 'Create Extension' }}
                </h2>

                <div class="space-y-3">
                    <input wire:model.defer="extension" class="w-full border rounded p-2" placeholder="Extension">
                    <input wire:model.defer="password" class="w-full border rounded p-2" placeholder="Password">
                    <input wire:model.defer="context" class="w-full border rounded p-2" placeholder="Context">
                    <input wire:model.defer="phone_type" class="w-full border rounded p-2" placeholder="Phone Type">
                    <input wire:model.defer="department" class="w-full border rounded p-2" placeholder="Department">
                    <input wire:model.defer="status" class="w-full border rounded p-2" placeholder="Status">
                </div>

                <div class="flex justify-end gap-2 mt-6">
                    <button
                        wire:click="$set('open', false)"
                        class="px-4 py-2 border rounded"
                    >
                        Cancel
                    </button>

                    <button
                        wire:click="save"
                        class="px-4 py-2 text-white bg-green-600 rounded"
                    >
                        Save
                    </button>
                </div>

            </div>
        </div>
    @endif
</div>
