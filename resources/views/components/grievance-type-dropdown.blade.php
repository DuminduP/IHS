<select {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @foreach ($types as $type)
        <option value="{{ $type->id }}" @if ($selectedId == $type->id) selected @endif>
            {{ $type->type }}
        </option>
    @endforeach
</select>
