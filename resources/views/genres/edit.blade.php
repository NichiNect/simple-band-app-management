@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header">Update Genre</div>
        <div class="card-body">
            <form action="{{ route('genres.update', $genre) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Fill a name.." value="{{ old('name') ?? $genre->name }}">
                    @error('name')
                        <small class="text-danger font-italic mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection