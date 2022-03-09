<select {{ $attributes->merge([ 'class' => 'form-select appearance-none block w-full px-3 py-1.5
        text-base font-normal text-gray-700 bg-white
        bg-clip-padding bg-no-repeat border-solid border-gray-300
        transition ease-in-out m-0 focus:bg-white focus:border-indigo-300 focus:outline-none']) }}>
    {{ $slot }}
</select>
