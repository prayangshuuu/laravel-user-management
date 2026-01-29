@props([
    'type' => 'text',
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'autofocus' => false,
])

<div class="mb-5">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="w-full px-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $autofocus ? 'autofocus' : '' }}
        {{ $attributes }}
    >

    @error($name)
        <p class="mt-1 text-sm font-bold text-red-600">{{ $message }}</p>
    @enderror
</div>
