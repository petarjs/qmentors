@extends('navigation-menu')

@section('links')
    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-nav-link>

    <x-jet-nav-link href="{{ route('mentors.courses.index') }}" :active="request()->routeIs('mentors.courses.index')">
        {{ __('Courses') }}
    </x-jet-nav-link>

@endsection

@section('responsive-links')
    <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-responsive-nav-link>

    <x-jet-responsive-nav-link href="{{ route('mentors.courses.index') }}"
                               :active="request()->routeIs('mentors.courses.index')">
        {{ __('Courses') }}
    </x-jet-responsive-nav-link>

@endsection
