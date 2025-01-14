@props(['active'])

@hasrole('admin|kepala sekolah')
@php
$classes = ($active ?? false)
            ? 'relative flex flex-row items-center h-11 focus:outline-none bg-green-500 text-white hover:text-gray-600 border-l-4 border-green-500 pr-6 '
            : 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-500 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6';
            
@endphp

@else
@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp
@endhasrole

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

<!-- ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out'; -->
