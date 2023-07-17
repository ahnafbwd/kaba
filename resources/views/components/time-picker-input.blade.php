@props(['disabled' => false])

<div class="relative">
    <input {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
        {{ $disabled ? 'disabled' : '' }}>
    {{-- <span
        class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" style="color: gray">
            <path fill-rule="evenodd"
                d="M10 3a7 7 0 100 14 7 7 0 000-14zM5 10a1 1 0 112 0v3.6l2.553-1.474a1 1 0 01.894 0L13 13.6V10a1 1 0 112 0v5a1 1 0 01-1 1H4a1 1 0 01-1-1v-5a1 1 0 112 0z"
                clip-rule="evenodd" />
        </svg>
    </span> --}}
</div>
