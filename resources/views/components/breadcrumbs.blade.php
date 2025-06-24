<div class="flex items-center text-md text-white">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-12 h-12 bg-blue-900 stroke-white rounded-3xl p-[8px] border-2 border-white z-40">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
    </svg>
    <p class="bg-blue-900 rounded-r-3xl border-2 border-white px-4 py-2 ml-[-11px] z-30">
        {{ $page }}
    </p>
    @isset($subpage)
        <a href="{{ redirect()->back() }}"
            class="bg-blue-900 border-2 border-white rounded-r-3xl px-4 py-2 ml-[-11px] z-20">
            {{ $subpage }}
        </a>
    @endisset
    @isset($category)
        <p class="bg-blue-900 border-2 border-white rounded-r-3xl px-4 py-2 ml-[-11px] z-10">
            {{ $category }}
        </p>
    @endisset
</div>
