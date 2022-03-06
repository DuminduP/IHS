@section('title', 'View SubInstitution Details')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sub-SubInstitution Detail View') }}
        </h2>
    </x-slot>

  <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="flex items-center justify-center" style="font-size: 20px; border-bottom: 1px dashed;">
            <h1 style="margin-right: 10px">Sub-Institution Details </h1>
            <a href="{{ route('edit-sub-institution', ['id' => $SubInstitution->id]) }}" title="Edit"><i class="fas fa-edit"></i></a>&nbsp;
            <a href="{{ route('print-sub-institution', ['id' => $SubInstitution->id]) }}" title="Print"><i class="fas fa-print"></i></a>
        </div>
        <div style="margin-top:20px">
            <x-namevalue-div :name="__('ID')" :value="$SubInstitution->id" />
            <x-namevalue-div :name="__('Institution Name')" :value="$SubInstitution->institution->name" />
            <x-namevalue-div :name="__('Sub-Institution Name')" :value="$SubInstitution->name" />
            <x-namevalue-div :name="__('Address')" :value="$SubInstitution->address" />
            <x-namevalue-div :name="__('Phone')" :value="$SubInstitution->phone " />
            <x-namevalue-div :name="__('Email')" :value="$SubInstitution->email" />
            <x-namevalue-div :name="__('Province')" :value="$SubInstitution->province->name" />
            <x-namevalue-div :name="__('District')" :value="$SubInstitution->district->name" />
            <x-namevalue-div :name="__('City')" :value="$SubInstitution->city->name" />
            <x-namevalue-div :name="__('Created At')" :value="$SubInstitution->created_at" />
            <x-namevalue-div :name="__('Updated At')" :value="$SubInstitution->updated_at" />
                <div class="md-4 block font-medium text-lg text-gray-700" style="width:45%;float:left;margin-bottom:10px;">
                    URL:
                </div>
                <div class="md-4 block font-medium text-lg text-gray-700" style="width:55%;float:left; margin-bottom:10px;">
                   <a href="{{env('QR_HOST').'/report/?sid='.$SubInstitution->id}}" target="_blank">{{env('QR_HOST').'/report/?sid='.$SubInstitution->id}}</a>
                </div>
            <x-namevalue-div :name="__('QRcode')" :value="QrCode::size(200)->generate(env('QR_HOST').'/report/?id='.$SubInstitution->id)" />
        </div>
    </x-crm-card>

    </x-app-layout>
