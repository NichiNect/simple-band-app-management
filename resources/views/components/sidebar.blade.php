<div class="list-group mb-3">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
</div>

<div class="mb-4">
    <small class="text-secondary font-weight-bold d-block mb-2">BAND</small>
    <div class="list-group">
        <a href="{{ route('bands.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('bands.index') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <small class="text-secondary font-weight-bold d-block mb-2">ALBUM</small>
    <div class="list-group">
        <a href="{{ route('albums.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('albums.index') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <small class="text-secondary font-weight-bold d-block mb-2">GENRE</small>
    <div class="list-group">
        <a href="{{ route('genres.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('genres.index') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <small class="text-secondary font-weight-bold d-block mb-2">Lyric</small>
    <div class="list-group">
        <a href="{{ route('lyrics.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('lyrics.index') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>