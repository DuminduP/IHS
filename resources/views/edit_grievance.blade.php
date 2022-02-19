<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Grievance') }}
        </h2>
    </x-slot>

    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="" id="edit-grievance-form">
            @csrf

            <div>
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                    :value="old('title', $grievance->title)" required autofocus />
            </div>
            <div>
                <x-label for="description" :value="__('Description')" />
                <x-textarea id="description" class="block mt-1 w-full" type="textarea" name="description"
                    :value="old('description', $grievance->description)" />
            </div>
            <div>
                <x-label for="notes" :value="__('notes')" />
                <x-textarea id="notes" class="block mt-1 w-full" type="textarea" name="notes"
                    :value="old('notes', $grievance->notes)" />
            </div>
            <div>
                <div class="w-1/2 pr-2" style="float: left">
                    <x-label for="status" :value="__('status')" />
                    <x-status-select id="status" class="block mt-1 w-full" name="status"
                        :value="old('status', $grievance->status)" />
                </div>
                <div class="w-1/2" style="float: left">
                    <x-label for="status" :value="__('Category')" />
                    <x-grievance-type-dropdown id="grievance_type_id" class="block mt-1 w-full" name="grievance_type_id"
                        :selected_id="old('status', $grievance->grievance_type_id)" />
                </div>
            </div>

            <div>
                <div class="ml-3 py-2" style="float: right">
                    <x-button class="ml-3">
                        {{ __('Update') }}
                    </x-button>
                </div>
                <div class="py-2">
                <label class="py-2">UUID : </label><span class="py-2">{{ $grievance->uuid }}</span>
                <br />
                <label class="py-2">Created At &nbsp;: </label><span class="py-2">{{ $grievance->created_at }}</span>
                <br />
                <label class="py-2">Updated At : </label><span class="py-2">{{ $grievance->updated_at }}</span>
                </div>
            </div>
        </form>
        </x-auth-card>
        </x-guest-layout>
