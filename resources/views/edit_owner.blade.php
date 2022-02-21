<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Grievance Owner') }}
        </h2>
    </x-slot>

    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="" id="edit-owner-form">
            @csrf

            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $owner->name)"
                    required pattern="[A-Za-z ]{2,100}" autofocus />
            </div>
            <div>
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address', $owner->address)" />
            </div>
            <div>
                <x-label for="mobile" :value="__('Mobile')" />
                <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile"
                    :value="old('mobile', $owner->mobile)" pattern="(07){1}[0-9]{8}" required />
            </div>
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email', $owner->email)" />
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
