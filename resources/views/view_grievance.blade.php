@section('title', 'View Grievance Details')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grievance Detail View') }}
        </h2>
    </x-slot>

    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="flex items-center justify-center" style="font-size: 20px; border-bottom: 1px dashed;">
            <h1 style="margin-right: 10px">Grievance Owner Details </h1>
            <a href="{{ route('edit-owner', ['id' => $grievance->grievance_owner_id]) }}" title="Edit"><i class="fas fa-edit"></i></a>
        </div>
        <div style="margin-top:20px">
            <x-namevalue-div :name="__('Name')" :value="$grievance->owner->name" />
            <x-namevalue-div :name="__('Address')" :value="$grievance->owner->address" />
            <x-namevalue-div :name="__('Mobile')" :value="$grievance->owner->mobile" />
            <x-namevalue-div :name="__('Email')" :value="$grievance->owner->email" />
        </div>

    </x-crm-card>    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="flex items-center justify-center" style="font-size: 20px; border-bottom: 1px dashed;">
            <h1 style="margin-right: 10px">Grievance Information </h1>
            <a href="{{ route('edit-grievanse', ['id' => $grievance->id]) }}" title="Edit"><i
                    class="fas fa-edit"></i></a>
        </div>
        <div style="margin-top:20px">
            <x-namevalue-div :name="__('UUID')" :value="$grievance->uuid" />
            <x-namevalue-div :name="__('Title')" :value="$grievance->title" />
            <x-namevalue-div :name="__('Description')" :value="$grievance->description" />
            <x-namevalue-div :name="__('Notes')" :value="$grievance->notes " />
            <x-namevalue-div :name="__('Institution')" :value="$grievance->institution->name" />
            <x-namevalue-div :name="__('Status')" :value="$grievance->status" />
            <x-namevalue-div :name="__('Category')" :value="$grievance->category?->type" />
                @if ($grievance->sub_institution)
                    <x-namevalue-div :name="__('Sub Institution')" :value="$grievance->sub_institution->name" />
                @endif
            <x-namevalue-div :name="__('Created At')" :value="$grievance->created_at" />
            <x-namevalue-div :name="__('Updated At')" :value="$grievance->updated_at" />
                @if ($grievance->files)
                <div class="md-4 block font-medium text-lg text-gray-700" style="width:45%;float:left;margin-bottom:10px;">
                    Files: 
                </div>
                <div class="md-4 block font-medium text-lg text-gray-700" style="width:55%;float:left; margin-bottom:10px;">
                    @foreach ($grievance->files as $file)
                        <a href="{{ asset('/grievanceFiles/').'/'.$file->name }}" target="_blank" style="color: #00f">{{$file->name}}</a></br/>
                    @endforeach
                </div>
                @endif
        </div>

    </x-crm-card>

    </x-app-layout>
