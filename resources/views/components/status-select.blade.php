@props(['disabled' => false, 'value', 
'options' => ['Open' => 'Open','In-prograss' => 'In-prograss','Rejected' =>'Rejected','Out of scope' => 'Out of scope','Done' => 'Done']])

    <select {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
    >
        @foreach ($options as $key => $label)
            <option value="{{ $key }}" @if ($value == $key) selected @endif>
                {{ $label }}
            </option>
        @endforeach

        {{ $append ?? '' }}
    </select>
