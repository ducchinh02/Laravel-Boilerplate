@php
$isActive = false;
$hasError = true;
$currnentTime = date('Y-m-d H:i:s')
@endphp

<span @class([ 'p-4' , 'font-bold'=> $isActive,
    'text-gray-500' => !$isActive,
    'bg-red' => $hasError,
    ])></span>

@if($isActive)
<span class="p-4 text-gray-500 bg-red ">
</span>
@endif

<span>{{$currnentTime}}</span>