@extends('layouts.backend')

@section('content')
    <x-alert></x-alert>
    <div class="card">
        <div class="card-header">
            Genres
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        {{-- <th scope="col">Band</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($genres as $genre)
                        <tr>
                            <th scope="row">
                                {{ $genres->count() * ($genres->currentPage() - 1) + $loop->iteration }}
                            </th>
                            <td>{{ $genre->name }}</td>
                            <td>
                                <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning text-white">Edit</a>
                                <div endpoint="{{ route('genres.destroy', $genre) }}" class="delete d-inline"></div>
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
                    {{ $genres->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection