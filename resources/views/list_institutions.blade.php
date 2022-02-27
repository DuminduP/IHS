<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-1/3">
            {{ __('Institutions') }}
        </h2>
        @if (session('status'))
            <x-alert>
                {{ session('status') }}
            </x-alert>
        @endif
        <div style="float: right; margin-top:-10px;">
            <a href="{{route('new-institution')}}" title="New Institution" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Institution</i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="dTable">
                        <thead>
                            <tr><th>ID</th><th>Name</th><th>Phone</th><th>City</th><th>District</th><th>Province</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)   
                            <tr>
                                <td>{{$institution->id}}</td>
                                <td>{{$institution->name}}</td>
                                <td>{{$institution->phone}}</td>
                                <td>{{$institution->city->name}}</td>
                                <td>{{$institution->district->name}}</td>
                                <td>{{$institution->province->name}}</td>
                                <td>
                                    <a href="{{route('edit-institution',['id' => $institution->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> &nbsp;
                                    <a href="{{route('view-institution',['id' => $institution->id] )}}" title="View"><i class="fas fa-eye"></i></a> &nbsp;
                                    <a href="{{route('print-institution',['id' => $institution->id] )}}" title="View"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
$(document).ready( function () {
    $('#dTable').DataTable({
        "order": [[ 0, "desc" ]]
    });
} );
</script>