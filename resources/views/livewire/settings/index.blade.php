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
           class="group relative flex flex-col gap-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900 dark:shadow-zinc-900/50">
            <div class="flex items-center gap-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-zinc-100 group-hover:bg-zinc-200 dark:bg-zinc-800 dark:group-hover:bg-zinc-700">
                    <x-icon.users class="h-5 w-5 text-zinc-900 dark:text-zinc-100" />
                </div>
                <h3 class="text-base font-semibold text-zinc-900 dark:text-white">
                    {{ __('Users') }}
                </h3>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                {{ __('Manage all PBX users, assign roles, and configure access.') }}
            </p>
        </a>

        <!-- Departments -->
        <a href="{{ route('departments.index') }}" 
           class="group relative flex flex-col gap-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900 dark:shadow-zinc-900/50">
            <div class="flex items-center gap-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-zinc-100 group-hover:bg-zinc-200 dark:bg-zinc-800 dark:group-hover:bg-zinc-700">
                    <x-icon.building-office class="h-5 w-5 text-zinc-900 dark:text-zinc-100" />
                </div>
                <h3 class="text-base font-semibold text-zinc-900 dark:text-white">
                    {{ __('Departments') }}
                </h3>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                {{ __('Create and manage company departments and assign users.') }}
            </p>
        </a>

        <!-- User Types -->
        <a href="{{ route('user-types.index') }}" 
           class="group relative flex flex-col gap-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900 dark:shadow-zinc-900/50">
            <div class="flex items-center gap-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-zinc-100 group-hover:bg-zinc-200 dark:bg-zinc-800 dark:group-hover:bg-zinc-700">
                    <x-icon.user-group class="h-5 w-5 text-zinc-900 dark:text-zinc-100" />
                </div>
                <h3 class="text-base font-semibold text-zinc-900 dark:text-white">
                    {{ __('User Types') }}
                </h3>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                {{ __('Define roles and access levels for PBX users.') }}
            </p>
        </a>

        <!-- Extensions -->
        <a href="{{ route('extensions.index') }}" 
           class="group relative flex flex-col gap-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900 dark:shadow-zinc-900/50">
            <div class="flex items-center gap-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-zinc-100 group-hover:bg-zinc-200 dark:bg-zinc-800 dark:group-hover:bg-zinc-700">
                    <x-icon.phone class="h-5 w-5 text-zinc-900 dark:text-zinc-100" />
                </div>
                <h3 class="text-base font-semibold text-zinc-900 dark:text-white">
                    {{ __('Extensions') }}
                </h3>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                {{ __('Manage phone extensions, types, and assign them to users.') }}
            </p>
        </a>

        <!-- Companies -->
        <a href="{{ route('companies.index') }}" 
           class="group relative flex flex-col gap-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900 dark:shadow-zinc-900/50">
            <div class="flex items-center gap-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-zinc-100 group-hover:bg-zinc-200 dark:bg-zinc-800 dark:group-hover:bg-zinc-700">
                    <x-icon.home class="h-5 w-5 text-zinc-900 dark:text-zinc-100" />
                </div>
                <h3 class="text-base font-semibold text-zinc-900 dark:text-white">
                    {{ __('Companies') }}
                </h3>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                {{ __('Manage company profiles and settings.') }}
            </p>
        </a>

        <!-- Branches -->
        <a href="{{ route('branches.index') }}" 
           class="group relative flex flex-col gap-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900 dark:shadow-zinc-900/50">
            <div class="flex items-center gap-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-zinc-100 group-hover:bg-zinc-200 dark:bg-zinc-800 dark:group-hover:bg-zinc-700">
                    <x-icon.map class="h-5 w-5 text-zinc-900 dark:text-zinc-100" />
                </div>
                <h3 class="text-base font-semibold text-zinc-900 dark:text-white">
                    {{ __('Branches') }}
                </h3>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                {{ __('Manage branch locations and assignments.') }}
            </p>
        </a>

    </div>
</div>
