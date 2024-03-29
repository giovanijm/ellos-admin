@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm invalid:border-red-700 valid:border-green-700 disabled:bg-gray-50 disabled:text-gray-500 dark:disabled:bg-slate-800 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400']) !!}>
