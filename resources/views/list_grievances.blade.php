<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grievanses') }}
        </h2>
        @if (session('status'))
            <x-alert>
                {{ session('status') }}
            </x-alert>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="dTable">
                        <thead>
                            <tr><th>ID</th><td>UUID</td><th>Title</th><th>Institution</th><th>Owner Name</th><th>Owner Mobile</th><th>Status</th><th>Created At</td><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($grievances as $grievanse)   
                            <tr>
                                <td>{{$grievanse->id}}</td>
                                <td>{{$grievanse->uuid}}</td>
                                <td>{{$grievanse->title}}</td>
                                <td>{{$grievanse->institution->name}}</td>
                                <td>{{$grievanse->owner->name}}</td>
                                <td><a href="tel:{{$grievanse->owner->mobile}}">{{$grievanse->owner->mobile}}</a></td>
                                <td>{{$grievanse->status}}</td>
                                <td>{{$grievanse->created_at}}</td>
                                <td>
                                    <a href="{{route('edit-grievanse',['id' => $grievanse->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> &nbsp;
                                    <a href="{{route('view-grievanse',['id' => $grievanse->id] )}}" title="View"><i class="fas fa-eye"></i></a> &nbsp;
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