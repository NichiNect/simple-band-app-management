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
    <input type="text" name="name" class="form-control" id="name" placeholder="Name.." value="{{ old('name') ?? $band->name }}">
    @error('name')
        <small class="text-danger font-italic mt-2">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="genres">Choose Genres</label>
    <select type="text" name="genres[]" class="form-control select2multiple" id="genres" placeholder="Choose genres.." multiple>
    @foreach ($genres as $genre)
    <option {{ $band->genres()->find($genre->id) ? 'selected' : '' }} value="{{ $genre->id }}">{{ $genre->name }}</option>
    @endforeach
    </select>
    @error('genres')
        <small class="text-danger font-italic mt-2">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>