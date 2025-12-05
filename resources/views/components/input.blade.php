@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'font-biorhyme border-ellas-nav bg-ellas-dark/50 text-white focus:border-ellas-pink focus:ring-ellas-pink placeholder-gray-500 rounded-xl shadow-inner transition-all duration-300 py-3']) !!}>