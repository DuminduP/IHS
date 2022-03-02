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
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="dTable">
                        <thead>
                            <tr><th>ID</th><th>Grievance ID</th><th>Rate</th><th>Comment</th><th>DateTime</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($ratings as $rating)   
                            <tr>
                                <td>{{$rating->id}}</td>
                                <td><a href="{{route('view-grievanse',['id' => $rating->grievance_id] )}}" target="_blank">{{$rating->grievance_id}}</a></td>
                                <td>{{$rating->rate}}</td>
                                <td>{{$rating->comment}}</td>
                                <td>{{$rating->created_at}}</td>
                                {{-- <td>
                                    <a href="{{route('edit-rating',['id' => $rating->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> &nbsp;
                                </td> --}}
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