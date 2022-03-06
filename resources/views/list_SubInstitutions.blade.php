<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-1/3">
            {{ __('SubInstitutions') }}
        </h2>
        @if (session('status'))
            <x-alert>
                {{ session('status') }}
            </x-alert>
        @endif
        @if(Auth::user()->role_id == 1)
        <div style="float: right; margin-top:-10px;">
            <a href="{{route('new-sub-institution')}}" title="New SubInstitution" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Sub-Institution</i></a>
        </div>
        @endif
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
                            @foreach ($SubInstitutions as $SubInstitution)   
                            <tr>
                                <td>{{$SubInstitution->id}}</td>
                                <td>{{$SubInstitution->name}}</td>
                                <td>{{$SubInstitution->phone}}</td>
                                <td>{{$SubInstitution->city->name}}</td>
                                <td>{{$SubInstitution->district->name}}</td>
                                <td>{{$SubInstitution->province->name}}</td>
                                <td>
                                @if(Auth::user()->role_id == 1)
                                    <a href="{{route('edit-sub-institution',['id' => $SubInstitution->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> &nbsp;
                                @endif
                                    <a href="{{route('view-sub-institution',['id' => $SubInstitution->id] )}}" title="View"><i class="fas fa-eye"></i></a> &nbsp;
                                    <a href="{{route('print-sub-institution',['id' => $SubInstitution->id] )}}" title="View"><i class="fas fa-print"></i></a>
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