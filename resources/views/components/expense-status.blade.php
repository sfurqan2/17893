@props(['status'])

<span {{ $attributes->merge([ 'class' => "px-2 inline-flex text-xs leading-5 font-semibold rounded-full " . $color ]) }}>
    {{ $status }}
</span> 