@extends('layouts.backend')

@section('content')
    <x-alert></x-alert>
    <div class="card">
        <div class="card-header">
            Albums
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Band</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($albums as $album)
                        <tr>
                            <th scope="row">
                                {{ $albums->count() * ($albums->currentPage() - 1) + $loop->iteration }}
                            </th>
                            <td>{{ $album->name }}</td>
                            <td>{{ $album->band->name }}</td>
                            <td>
                                <a href="{{ route('albums.edit', $album) }}" class="btn btn-warning text-white">Edit</a>
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
                    {{ $albums->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection