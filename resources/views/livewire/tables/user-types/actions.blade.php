<div class="flex gap-2">
    <!-- Edit User Type (Eye Icon) -->
    <button
        wire:click="$dispatch('editUserType', { id: @js($row->id) })"
        class="group relative flex items-center justify-center p-2 text-gray-400 transition-all duration-300 hover:text-green-600 focus:outline-none"
        title="{{ __('Edit') }}"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-hover:scale-125" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
    </button>

    <!-- Delete User Type (Bin Icon) -->
    <button
        wire:click="$dispatch('deleteUserType', { id: @js($row->id) })"
        wire:confirm="{{ __('Are you sure you want to delete this user type?') }}"
        class="group relative flex items-center justify-center p-2 text-gray-400 transition-all duration-300 hover:text-red-500 focus:outline-none"
        title="{{ __('Delete') }}"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7" />
            <g class="transition-transform duration-300 group-hover:-translate-y-1 group-hover:rotate-12 origin-top-left">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 4V3a1 1 0 011-1h2a1 1 0 011 1v1M4 7h16" />
            </g>
        </svg>
    </button>
</div>
