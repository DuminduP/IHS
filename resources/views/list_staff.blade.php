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
            <a href="{{route('register')}}" title="New Institution" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Staff</i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="dTable">
                        <thead>
                            <tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Role</th><th>Status</th><th>Institution</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($staff_list as $staff)   
                            <tr>
                                <td>{{$staff->id}}</td>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->phone}}</td>
                                <td>{{$staff->email}}</td>
                                <td>{{$staff->role->name}}</td>
                                <td>{{$staff->status}}</td>
                                <td>{{$staff->institution?->name}}</td>
                                <td>
                                    <a href="{{route('edit-staff',['id' => $staff->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> &nbsp;
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