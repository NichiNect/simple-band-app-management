@extends('layouts.base')

@section('baseStyles')
    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
@endsection

@section('baseScripts')
<!-- Scripts -->
<script src="{{ asset('js/backend.js') }}"></script>
@yield('script')
@endsection

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

@endsection
