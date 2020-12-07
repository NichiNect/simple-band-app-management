<div class="form-group">
    <label for="band">Band</label>
    <select name="band" id="band" class="form-control">
        <option selected disabled>Choose a band..</option>
        @foreach ($bands as $band)
            <option {{ $band->id == $album->band_id ? 'selected' : '' }} value="{{ $band->id }}">{{ $band->name }}</option>
        @endforeach
    </select>
    @error('band')
        <small class="text-danger font-italic mt-2">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Fill a name.." value="{{ old('name') ?? $album->name }}">
    @error('name')
        <small class="text-danger font-italic mt-2">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="year">Year</label>
    <select name="year" id="year" class="form-control">
        <option selected disabled>Choose a year..</option>
        @for ($i=1995; $i<=date('Y', time()); $i++)
        <option {{ $album->year == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
    @error('year')
        <small class="text-danger font-italic mt-2">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>