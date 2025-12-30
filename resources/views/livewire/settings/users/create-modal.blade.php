<div>
    <flux:modal name="create-user" wire:model="open" class="max-w-6xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $userId ? __('Edit User') : __('Create User') }}</flux:heading>
            </div>

            <form wire:submit="save" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Basic Information -->
                    <div>
                        <flux:input wire:model="name" :label="__('Name')" required />
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:input wire:model="user_name" :label="__('User Name')" required />
                        @error('user_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:input wire:model="email" type="email" :label="__('Email')" required />
                        @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:input wire:model="phone" :label="__('Phone')" />
                        @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:input wire:model="nic" :label="__('NIC')" />
                        @error('nic') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:input wire:model="address" :label="__('Address')" required />
                        @error('address') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                     @if(!$userId)
                    <div>
                        <flux:input wire:model="password" type="password" :label="__('Password')" :required="!$userId" viewable />
                        @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    @endif

                    <div>
                        <flux:select wire:model="gender" :label="__('Gender')">
                            <flux:select.option value="">{{ __('Select Gender') }}</flux:select.option>
                            <flux:select.option value="male">{{ __('Male') }}</flux:select.option>
                            <flux:select.option value="female">{{ __('Female') }}</flux:select.option>
                            <flux:select.option value="other">{{ __('Other') }}</flux:select.option>
                        </flux:select>
                        @error('gender') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:select wire:model.live="user_type_id" :label="__('User Type')" required>
                            <flux:select.option value="">{{ __('Select User Type') }}</flux:select.option>
                            @foreach($userTypes as $type)
                                <flux:select.option value="{{ $type->id }}">{{ $type->title }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        @error('user_type_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Hierarchical Selection -->
                    <div>
                        <flux:select wire:model.live="tenant_context" :label="__('Company')" required>
                            <flux:select.option value="">{{ __('Select Company') }}</flux:select.option>
                            @foreach($companies as $company)
                                <flux:select.option value="{{ $company->name }}">{{ $company->name }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        @error('tenant_context') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:select wire:model.live="branch_id" :label="__('Branch')" required :disabled="!$tenant_context" wire:key="branch-select-{{ $tenant_context }}">
                            <flux:select.option value="">{{ __('Select Branch') }}</flux:select.option>
                            @foreach($branches as $branch)
                                <flux:select.option value="{{ $branch->id }}">{{ $branch->name }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        @error('branch_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <flux:select wire:model="department_id" :label="__('Department')" required :disabled="!$branch_id" wire:key="dept-select-{{ $branch_id }}">
                            <flux:select.option value="">{{ __('Select Department') }}</flux:select.option>
                            @foreach($departments as $dept)
                                <flux:select.option value="{{ $dept->id }}">{{ $dept->name }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        @error('department_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    @if(!$userId)
                    <div>
                        <flux:select wire:model="extension" :label="__('Extension')">
                            <flux:select.option value="">{{ __('Select Extension') }}</flux:select.option>
                            @foreach($extensions as $ext)
                                <flux:select.option value="{{ $ext->extension }}">{{ $ext->extension }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        @error('extension') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    @else
                        @if($extension)
                        <div>
                            <flux:label>{{ __('Extension') }}</flux:label>
                            <div class="flex items-center justify-between p-2 mt-1 border border-gray-200 rounded-md dark:border-white/10 bg-gray-50 dark:bg-white/5">
                                <span class="text-sm">{{ $extension }}</span>
                                <button type="button" 
                                    wire:click="unassignExtension" 
                                    wire:confirm="{{ __('Are you sure you want to unassign this extension?') }}"
                                    class="p-1 transition-colors rounded-md hover:bg-red-50 dark:hover:bg-red-900/20 text-red-500" 
                                    title="{{ __('Unassign Extension') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endif
                    @endif

                    

                    @if($user_type_id == 5)
                        <div>
                            <flux:select wire:model="outlet_id" :label="__('Outlet')" required>
                                <flux:select.option value="">{{ __('Select Outlet') }}</flux:select.option>
                                @foreach($outlets as $outlet)
                                    <flux:select.option value="{{ $outlet['id'] }}">{{ $outlet['name'] }}</flux:select.option>
                                @endforeach
                            </flux:select>
                            @error('outlet_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    @endif

                </div>

                <div class="flex justify-end space-x-2">
                    <flux:modal.close>
                        <flux:button variant="ghost">{{ __('Cancel') }}</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="primary">{{ __('Save') }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>

