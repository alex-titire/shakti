<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border-2 rounded-md uppercase border-pink-300 hover:bg-pink-400 hover:text-pink-100 active:bg-pink-500 active:text-pink-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
