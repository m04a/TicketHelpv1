<div>
    <div {{ $attributes->merge([ 'class' => 'border border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700" role="alert']) }}>
        <p>{{ $slot }}</p>
    </div>
</div>
