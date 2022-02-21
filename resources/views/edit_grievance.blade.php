<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Grievance') }}
        </h2>
    </x-slot>

    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="" id="edit-grievance-form" enctype="multipart/form-data">
            @csrf

            <div>
                <x-namevalue-div :name="__('Title')" :value="$grievance->title" />
                <x-namevalue-div :name="__('Description')" :value="$grievance->description" />
            </div>

                    <div>
                        <x-label for="notes" :value="__('notes')" />
                        <x-textarea id="notes" class="block mt-1 w-full" type="textarea" name="notes"
                            :value="old('notes', $grievance->notes)" />
                    </div>
                    <div>
                        <div class="w-1/2 pr-2" style="float: left">
                            <x-label for="status" :value="__('status')" />
                            <x-status-select id="status" class="block mt-1 w-full" name="status"
                                :value="old('status', $grievance->status)" />
                        </div>
                        <div class="w-1/2" style="float: left">
                            <x-label for="status" :value="__('Category')" />
                            <x-grievance-type-dropdown id="grievance_type_id" class="block mt-1 w-full"
                                name="grievance_type_id" :selected_id="old('status', $grievance->grievance_type_id)" />
                        </div>
                        <div class="w-1/2 pr-2" style="float: left">
                            <x-label for="status" :value="__('Institution')" />
                            <x-institution-dropdown id="institution_id" class="block mt-1 w-full" name="institution_id"
                                :selected_id="old('institution_id', $grievance->institution_id)" />
                        </div>
                        <div class="w-1/2" style="float: left">
                            <x-label for="status" :value="__('Sub Institution')" />
                            <x-sub-institution-dropdown id="sub_institution_id" class="block mt-1 w-full"
                                name="sub_institution_id"
                                :selected_id="old('sub_institution_id', $grievance->sub_institution_id)"
                                :institutionId="old('institution_id', $grievance->institution_id)" />
                        </div>
                    </div>
                    <div>
                        <x-label for="file" :value="__('File upload')" />
                        <x-input id="file"
                            class="form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0"
                            type="file" name="file" accept="image/*,audio/*,video/*,.pdf,.doc,.docx" />
                    </div>

                    <div>
                        <div class="ml-3 py-2" style="float: right">
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                        <div class="ml-3 py-2" style="float: right">
                            <x-button class="ml-3 bg-gray-400" type="reset" style="background-color: rgb(55 65 81)">
                                {{ __('Reset') }}
                            </x-button>
                        </div>
                        <div class="py-2">
                            <label class="py-2">UUID : </label><span
                                class="py-2">{{ $grievance->uuid }}</span>
                            <br />
                            <label class="py-2">Created At &nbsp;: </label><span
                                class="py-2">{{ $grievance->created_at }}</span>
                            <br />
                            <label class="py-2">Updated At : </label><span
                                class="py-2">{{ $grievance->updated_at }}</span>
                            @if ($grievance->files)
                                <div>
                                    <div class="md-4 block font-medium text-lg text-gray-700" style="float:left;">
                                        Files:
                                    </div>
                                    <div class="md-4 block font-medium text-lg text-gray-700" style="float:left;">
                                        @foreach ($grievance->files as $file)
                                            <a href="/grievanceFiles/{{ $file->name }}" target="_blank"
                                                style="color: #00f">{{ $file->name }}</a></br />
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
        </form>
        </x-auth-card>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#institution_id').on('change', function() {
                    var institution_id = $(this).val();
                    if (institution_id) {
                        $('#sub_institution_id').empty();
                        $.ajax({
                            url: '/sub-institutions/' + institution_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                for (row of data) {
                                    $('#sub_institution_id').append('<option value="' +
                                        row.id + '">' + row.name + '</option>');
                                }

                            }
                        });
                    } else {
                        $('#sub_institution_id').empty();
                    }
                });
            });
        </script>

</x-app-layout>
