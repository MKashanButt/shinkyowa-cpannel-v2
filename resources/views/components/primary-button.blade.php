<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-md px-4 py-2 bg-blue-900 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-700 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
