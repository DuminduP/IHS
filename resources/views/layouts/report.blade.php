<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-1/3">
            @yield('maintitle')
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="margin-top: 10px;">
            <div class="w-full px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="GET" action="" id="edit-SubInstitution">
                    <div class="w-1/2 pr-2" style="float: left">
                        <x-label for="from" :value="__('From Date')" />
                        <x-input type="date" id="from" max="{{$today}}" class="block mt-1 w-full" name="from" value="{{old('from', $from)}}" />
                    </div>
                    <div class="w-1/2 pr-2" style="float: left">
                        <x-label for="to" :value="__('To Date')" />
                        <x-input type="date" id="to" max="{{$today}}" class="block mt-1 w-full" name="to" value="{{old('to', $to)}}" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <div class="ml-3">
                            <x-button class="ml-3">
                                {{ __('Filter') }}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('#dTable').DataTable({
            "dom": 'Blfrtip',
            "bFilter": false,
            "lengthChange": false,
            "paging": false,
            "info": false,
            "order": [
                [0, "asc"]
            ],
            buttons: [
                 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#from, #to').on('change', function() {
            $('#from').attr('max', $('#to').val());
        });
    });
</script>