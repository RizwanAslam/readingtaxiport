@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        <a href="#" class="logo" style='color: #f6755e;
			font-family: "Pacifico", cursive;
			font-size: 2.5em;
			letter-spacing: 2px;
			margin-top: -5px;
			text-decoration: none;'>jubilecars</a>
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} <h3>jubilecars</h3>. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
