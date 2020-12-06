@extends('layouts.base')

@section('body')
    <x-navbar></x-navbar>
    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-md-3">
                <x-sidebar></x-sidebar>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('script')

@endsection