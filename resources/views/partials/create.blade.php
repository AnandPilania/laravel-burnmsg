@extends('burnmsg::master')

@section('content')
	<form method="post" action="/burnmsg">
		{{ csrf_field() }}
		@if($errors->first())
		<div class="alert alert-danger">
			{{ $errors->first() }}
		</div>
		@endif
		<label for="body">Message</label>
		<textarea id="body" name="body" placeholder="Your secret message!"></textarea>
		<button type="submit">Submit</button>
	</form>
	@endsection