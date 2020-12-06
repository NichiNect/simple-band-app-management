@extends('layouts.backend')

@section('content')
    {{-- <x-alert></x-alert> --}}

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Genre</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bands as $band)
                <tr>
                    <th scope="row">
                        {{ $bands->count() * ($bands->currentPage() - 1) + $loop->iteration }}
                    </th>
                    <td>{{ $band->name }}</td>
                    <td>{{ $band->genres()->get()->implode('name', ', ') }}</td>
                    <td>
                        <a href="#" class="btn btn-warning text-white">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h3>Data is Empty</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="row">
        <div class="col-lg">
            {{ $bands->links() }}
        </div>
    </div>

@endsection