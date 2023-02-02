@props(['viewInfoUser' => true])

<div class="grid grid-cols-1 place-items-center mt-2 p-4">
    <div class="relative inline-flex items-center justify-center  w-16 h-16 ring-2 ring-cyan-600 ring-offset-2 ring-offset-slate-900 drop-shadow-sm overflow-hidden rounded-full bg-gray-600">
        {{ $slot }}
    </div>
    @if ($viewInfoUser)
        <p class="font-bold text-sm text-gray-300 uppercase mt-2">{{ Auth::user()->name }}</p>
        <p class="text-sm text-gray-500">{{Auth::user()->email}}</p>
    @endif
</div>
