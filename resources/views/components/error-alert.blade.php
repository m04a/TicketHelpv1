<div>
    <div {{ $attributes->merge([ 'class' => 'border border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" role="alert']) }}>
        <p>{{ $slot }}.</p>
    </div>
</div>