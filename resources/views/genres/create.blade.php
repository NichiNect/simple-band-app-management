@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header">New Genres</div>
        <div class="card-body">
            <form action="{{ route('genres.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Fill a name..">
                    @error('name')
                        <small class="text-danger font-italic mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection