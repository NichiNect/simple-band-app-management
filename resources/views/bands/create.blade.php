@extends('layouts.backend')

@section('content')
    <x-alert></x-alert>
    <div class="card">
        <div class="card-header">
            Create Band
        </div>
        <div class="card-body">
            <form action="{{ route('bands.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <div class="custom-file">
                        <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                        <label class="custom-file-label" for="thumbnail">Choose file for Thumbnail...</label>
                    </div>
                    @error('thumbnail')
                        <small class="text-danger font-italic mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name..">
                    @error('name')
                        <small class="text-danger font-italic mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genres">Choose Genres</label>
                    <select type="text" name="genres[]" class="form-control" id="genres" placeholder="Choose genres.." multiple>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @error('genres')
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

@section('script')
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>
@endsection