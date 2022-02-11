@props(['name','value'])

<div {{ $attributes->merge(['class' => 'md-4 block font-medium text-lg text-gray-700']) }} style="width:45%;float:left;margin-bottom:10px;">
    {{ $name ?? $slot }}:
</div>
<div {{ $attributes->merge(['class' => 'md-4 block font-medium text-lg text-gray-700']) }} style="width:55%;float:left; margin-bottom:10px;">
    {{ $value ?? $slot }}
</div>
