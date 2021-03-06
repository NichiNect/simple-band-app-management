@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Band
        </div>
        <div class="card-body">
            <form action="{{ route('bands.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('bands.partials._form')
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
    
    $(document).ready(function() {
        $('.select2multiple').select2({
            placeholder: 'Choose the genres..'
        });
    });
</script>
@endsection