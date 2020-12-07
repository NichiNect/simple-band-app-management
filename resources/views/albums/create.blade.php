@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('albums.store') }}" method="post">
                @csrf
                
                @include('albums.partials._form')
            </form>
        </div>
    </div>
@endsection