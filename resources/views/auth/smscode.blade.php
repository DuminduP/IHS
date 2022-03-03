<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('/logo.png') }}" alt="logo" />
            </a>
        </x-slot>
        <h2 style="text-align: center; font-size: 20px;">Grievance Information System</h2>
        <p>Please check SMS on your registered mobile phone.</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="" id="code-form">
            @csrf

            <!-- Code -->
            <div class="mt-4">
                <x-label for="code" :value="__('Login Code')" />

                <x-input id="code" class="block mt-1 w-full" type="text" name="code" pattern="[0-9]{6}" required />

            </div>
            <br/>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
