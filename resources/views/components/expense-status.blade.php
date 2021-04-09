@props(['status'])
<span {{ $attributes->merge([ 'class' => "px-2 inline-flex text-xs leading-5 font-semibold rounded-full " . ($status === 'APPROVED' ?  'bg-green-100 text-green-800' : ($status === 'PENDING' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800')) ]) }}>
    {{ $status }}
</span> 