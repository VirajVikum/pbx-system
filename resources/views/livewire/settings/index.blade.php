<div class="p-6 space-y-6">
    <!-- Page Title -->
    <div>
        <flux:heading size="xl" level="1">{{ __('Settings') }}</flux:heading>
        <flux:subheading>{{ __('Manage your application settings, users, and organizational structure.') }}</flux:subheading>
    </div>

    <!-- Settings Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        
        <!-- Users -->
        <a href="{{ route('pbx-users.index') }}" 
           class="group relative p-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition flex flex-col gap-2">
            <div class="flex items-center gap-4">
                <x-icon.users class="w-6 h-6 text-gray-700 dark:text-gray-300" />
                <span class="text-gray-900 dark:text-white font-medium group-hover:text-gray-900">
                    {{ __('Users') }}
                </span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                {{ __('Manage all PBX users, assign roles, and configure access.') }}
            </p>
        </a>

        <!-- Departments -->
        <a href="{{ route('departments.index') }}" 
           class="group relative p-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition flex flex-col gap-2">
            <div class="flex items-center gap-4">
                <x-icon.building-office class="w-6 h-6 text-gray-700 dark:text-gray-300" />
                <span class="text-gray-900 dark:text-white font-medium group-hover:text-gray-900">
                    {{ __('Departments') }}
                </span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                {{ __('Create and manage company departments and assign users.') }}
            </p>
        </a>

        <!-- User Types -->
        <a href="{{ route('user-types.index') }}" 
           class="group relative p-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition flex flex-col gap-2">
            <div class="flex items-center gap-4">
                <x-icon.user-group class="w-6 h-6 text-gray-700 dark:text-gray-300" />
                <span class="text-gray-900 dark:text-white font-medium group-hover:text-gray-900">
                    {{ __('User Types') }}
                </span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                {{ __('Define roles and access levels for PBX users.') }}
            </p>
        </a>

        <!-- Extensions -->
        <a href="{{ route('extensions.index') }}" 
           class="group relative p-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition flex flex-col gap-2">
            <div class="flex items-center gap-4">
                <x-icon.phone class="w-6 h-6 text-gray-700 dark:text-gray-300" />
                <span class="text-gray-900 dark:text-white font-medium group-hover:text-gray-900">
                    {{ __('Extensions') }}
                </span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                {{ __('Manage phone extensions, types, and assign them to users.') }}
            </p>
        </a>
        <!-- companies -->
        <a href="{{ route('companies.index') }}" 
           class="group relative p-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition flex flex-col gap-2">
            <div class="flex items-center gap-4">
                <x-icon.home class="w-6 h-6 text-gray-700 dark:text-gray-300" />
                <span class="text-gray-900 dark:text-white font-medium group-hover:text-gray-900">
                    {{ __('companies') }}
                </span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                {{ __('Manage phone extensions, types, and assign them to users.') }}
            </p>
        </a>
        <!-- branches -->
        <a href="{{ route('branches.index') }}" 
           class="group relative p-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition flex flex-col gap-2">
            <div class="flex items-center gap-4">
                <x-icon.map class="w-6 h-6 text-gray-700 dark:text-gray-300" />
                <span class="text-gray-900 dark:text-white font-medium group-hover:text-gray-900">
                    {{ __('branches') }}
                </span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                {{ __('Manage phone branches, types, and assign them to users.') }}
            </p>
        </a>

    </div>
</div>
