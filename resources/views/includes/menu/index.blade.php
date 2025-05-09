@php
    $roleId = session('user_role');
@endphp

@switch($roleId)
    @case(1)
        @include('includes.menu.partials.admin')
        @break

    @case(2)
        @include('includes.menu.partials.manager')
        @break

    @case(3)
        @include('includes.menu.partials.attendant')
        @break

    @case(4)
        @include('includes.menu.partials.cleaner')
        @break

    @default
        {{-- Optionally include a default menu or message --}}
@endswitch
