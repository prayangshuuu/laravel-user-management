@props([
    'title' => null,
    'footer' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white border-2 border-black p-6 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]']) }}>
    @if($title)
        <div class="mb-6 border-b-2 border-black pb-4">
            <h2 class="text-2xl font-black text-black uppercase tracking-tight">{{ $title }}</h2>
        </div>
    @endif

    <div>
        {{ $slot }}
    </div>

    @if($footer)
        <div class="mt-6 pt-4 border-t-2 border-black flex justify-end">
            {{ $footer }}
        </div>
    @endif
</div>
