<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Staff Member') }}
        </h2>
    </x-slot>

    <x-crm-card class="w-1/3">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="" id="edit-staff-form">
            @csrf

            <div class="flex flex-wrap -mx-3">
                <div class="w-1/3 pr-2">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name', $user->name)" pattern="[A-Za-z ]{2,100}" autofocus autofill="no" required />
                </div>
                @if (empty($user->id))
                    <div class="w-1/3 pr-2">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                            :value="old('password')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            required />
                    </div>
                    <div class="w-1/3 pr-2">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" :value="old('password_confirmation')"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            required />
                    </div>
                @endif
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-1/3 pr-2">
                    <x-label for="mobile" :value="__('Mobile')" />
                    <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile"
                        :value="old('mobile', $user->mobile)" pattern="(07){1}[0-9]{8}" required />
                </div>
                <div class="w-1/3 pr-2">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email', $user->email)" required/>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-1/3 pr-2">
                    <x-label for="role_id" :value="__('Role')" />
                    <x-user-roles-dropdown id="role_id" class="block mt-1 w-full" name="role_id"
                        :selected_id="old('role_id', $user->role_id)" required />
                </div>
                <div class="w-1/3 pr-2" style="float: left">
                    <x-label for="status" :value="__('Institution')" />
                    <x-institution-dropdown id="institution_id" class="block mt-1 w-full" name="institution_id"
                        :selected_id="old('institution_id', $user->institution_id)" required />
                </div>
                <div class="w-1/3 pr-2">
                    <x-label for="status" :value="__('Status')" />
                    <select name="status" 
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1" @if (old('status', $user->status) == 1) selected @endif>
                            Active
                        </option>
                        <option value="0" @if (old('status', $user->status) == 0) selected @endif>
                            Inactive
                        </option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">

                <div class="ml-3 py-2" style="float: right">
                    <x-button class="ml-3 bg-gray-400" type="reset" style="background-color: rgb(55 65 81)">
                        {{ __('Reset') }}
                    </x-button>
                </div>
                <div class="ml-3">
                    <x-button class="ml-3">
                        {{ __('Update') }}
                    </x-button>
                </div>

            </div>
        </form>
        </x-auth-card>
        </x-guest-layout>
