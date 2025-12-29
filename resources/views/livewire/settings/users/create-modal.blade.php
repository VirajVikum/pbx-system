<div>
    @if($open)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="w-full max-w-lg p-6 bg-white rounded-lg">

                <h2 class="mb-4 text-lg font-semibold">
                    {{ $userId ? 'Edit User' : 'Create User' }}
                </h2>

                <div class="space-y-3">
                    <input
                        wire:model.defer="name"
                        class="w-full border rounded p-2"
                        placeholder="Name"
                    >

                    <input
                        wire:model.defer="email"
                        class="w-full border rounded p-2"
                        placeholder="Email"
                    >

                    <input
                        wire:model.defer="phone"
                        class="w-full border rounded p-2"
                        placeholder="Phone"
                    >

                    <input
                        wire:model.defer="extension"
                        class="w-full border rounded p-2"
                        placeholder="Extension"
                    >
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
