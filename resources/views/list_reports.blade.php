<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-1/3">
            {{ __('Reports') }}
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
                    <a href="{{route('report-category')}}">Grievance by Category</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('report-status')}}">Grievance by Status</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('report-location')}}">Grievance by Location</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('report-grievances')}}">All Grievance</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('report-grievances')}}/open">New Grievance</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('report-grievances')}}/Done">Completed Grievance</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('report-grievances')}}/In-prograss">In-prograss Grievance</a>
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