@props([
    'title',
    'subtitle' => null,
    'action' => null,
])

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b-2 border-black pb-6">
    <div>
        <h1 class="text-4xl font-black text-black uppercase tracking-tight mb-1">{{ $title }}</h1>
        @if($subtitle)
            <p class="font-bold text-gray-600">{{ $subtitle }}</p>
        @endif
    </div>

    @if($action)
        <div>
            {{ $action }}
        </div>
    @endif
</div>
