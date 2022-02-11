@section('title', 'New Grievance Registration : ')
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
            <a href="{{ route('edit-grievanse', ['id' => $grievance->id]) }}" title="Edit"><i
                    class="fas fa-edit"></i></a>
        </div>
        <div style="margin-top:20px">
            <x-namevalue-div :name="__('Name')" :value="$grievance->owner->name" />
            <x-namevalue-div :name="__('Address')" :value="$grievance->owner->address" />
            <x-namevalue-div :name="__('Mobile')" :value="$grievance->owner->mobile" />
            <x-namevalue-div :name="__('Email')" :value="$grievance->email" />
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
            <x-namevalue-div :name="__('Title')" :value="$grievance->title" />
            <x-namevalue-div :name="__('Description')" :value="$grievance->description" />
            <x-namevalue-div :name="__('Notes')" :value="$grievance->notes" />
            <x-namevalue-div :name="__('Institution')" :value="$grievance->institution->name" />
            {{-- <x-namevalue-div :name="__('Sub Institution')" :value="$grievance->sub_institution->name" /> --}}
        </div>

    </x-crm-card>


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="dTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created Date</th>
                                <th>Airline</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grievance->tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>{{ $ticket->airline }}</td>
                                    <td>{{ $ticket->from }}</td>
                                    <td>{{ $ticket->to }}</td>
                                    <td><a href="{{ route('edit_ticket', ['id' => $ticket->id]) }}"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </x-guest-layout>

    <script>
        $(document).ready(function() {
            $('#dTable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>