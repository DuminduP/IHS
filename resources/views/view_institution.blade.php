@section('title', 'View Institution Details')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Institution Detail View') }}
        </h2>
    </x-slot>

  <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="flex items-center justify-center" style="font-size: 20px; border-bottom: 1px dashed;">
            <h1 style="margin-right: 10px">Institution Details </h1>
            <a href="{{ route('edit-institution', ['id' => $institution->id]) }}" title="Edit"><i class="fas fa-edit"></i></a>
        </div>
        <div style="margin-top:20px">
            <x-namevalue-div :name="__('ID')" :value="$institution->id" />
            <x-namevalue-div :name="__('Name')" :value="$institution->name" />
            <x-namevalue-div :name="__('Address')" :value="$institution->address" />
            <x-namevalue-div :name="__('Phone')" :value="$institution->phone " />
            <x-namevalue-div :name="__('Email')" :value="$institution->email" />
            <x-namevalue-div :name="__('Province')" :value="$institution->province->name" />
            <x-namevalue-div :name="__('District')" :value="$institution->district->name" />
            <x-namevalue-div :name="__('City')" :value="$institution->city->name" />
            <x-namevalue-div :name="__('Created At')" :value="$institution->created_at" />
            <x-namevalue-div :name="__('Updated At')" :value="$institution->updated_at" />
        </div>
    </x-crm-card>

    </x-app-layout>
