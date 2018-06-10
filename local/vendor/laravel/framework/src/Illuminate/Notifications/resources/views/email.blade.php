@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => $actionUrl])
            KHACTRIEUCAMERA
        @endcomponent
    @endslot

    {{-- Body --}}
    <!-- Body here -->
@foreach ($introLines as $line)
{{ $line }}

@endforeach
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach
    
    {{-- Subcopy --}}
    @slot('subcopy')
        @component('mail::subcopy')
            Regards,<br> Khactrieucamera
        @endcomponent
    @endslot


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © 2018 Khactrieucamera. Đã đăng ký Bản quyền.
        @endcomponent
    @endslot
@endcomponent