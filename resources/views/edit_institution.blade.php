<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($institution->id)
                {{ __('Edit Institution') }}
            @else
                {{ __('Add Institution') }}
            @endif
        </h2>
    </x-slot>

    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="" id="edit-institution">
            @csrf

            <div class="flex flex-wrap -mx-3">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name', $institution->name)" required autofocus />
            </div>
            <div class="flex flex-wrap -mx-3">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address', $institution->address)" />
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-1/2 pr-2">
                    <x-label for="mobile" :value="__('Phone')" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                        :value="old('phone', $institution->phone)" pattern="(0){1}[0-9]{9}" required />
                </div>
                <div class="w-1/2">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email', $institution->email)" />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-1/3 pr-2">
                    <x-label for="status" :value="__('Province')" />
                    <x-provinces-dropdown id="province_id" class="block mt-1 w-full" name="province_id"
                        :selected_id="old('province_id', $institution->province_id)" />
                </div>
                <div class="w-1/3 pr-2">
                    <x-label for="status" :value="__('District')" />
                    <x-districts-dropdown id="district_id" class="block mt-1 w-full" name="district_id"
                        :selected_id="old('district_id', $institution->district_id)"
                        :province_id="old('province_id', $institution->province_id)" />
                </div>

                <div class="w-1/3">
                    <x-label for="status" :value="__('City')" />
                    <x-cities-dropdown id="city_id" class="block mt-1 w-full" name="city_id"
                        :selected_id="old('city_id', $institution->city_id)"
                        :district_id="old('district_id', $institution->district_id)" />
                </div>
            </div>
            <div>
                <div class="flex items-center justify-end mt-4">
                    <div class="ml-3 py-2" style="float: right">
                        <x-button class="ml-3 bg-gray-400" type="reset" style="background-color: rgb(55 65 81)">
                            {{ __('Reset') }}
                        </x-button>
                    </div>
                    <div class="ml-3">
                        <x-button class="ml-3">
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
        </x-auth-card>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#province_id').on('change', function() {
                    var province_id = $(this).val();
                    if (province_id) {
                        $('#district_id').empty();
                        $.ajax({
                            url: '{{ env('APP_URL') }}/districts/' + province_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                for (row of data) {
                                    $('#district_id').append('<option value="' +
                                        row.id + '">' + row.name + '</option>');
                                }

                            }
                        });
                    } else {
                        $('#district_id').empty();
                    }
                });

                $('#district_id').on('change', function() {
                    var district_id = $(this).val();
                    if (district_id) {
                        $('#city_id').empty();
                        $.ajax({
                            url: '{{ env('APP_URL') }}/cities/' + district_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                for (row of data) {
                                    $('#city_id').append('<option value="' +
                                        row.id + '">' + row.name + '</option>');
                                }

                            }
                        });
                    } else {
                        $('#city_id').empty();
                    }
                });
            });
        </script>

</x-app-layout>
